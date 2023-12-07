"use strict";

// Class definition
var KTCreateAccount = function () {
	// Elements
	var modal;
	var modalEl;

	var stepper;
	var form;
	var formSubmitButton;
	var formContinueButton;

	// Variables
	var stepperObj;
	var validations = [];

	// Private Functions
	var initStepper = function () {
		// Initialize Stepper
		stepperObj = new KTStepper(stepper);

		// Stepper change event
		stepperObj.on('kt.stepper.changed', function (stepper) {
			if (stepperObj.getCurrentStepIndex() === 4) {
				formSubmitButton.classList.remove('d-none');
				formSubmitButton.classList.add('d-inline-block');
				formContinueButton.classList.add('d-none');
			} else if (stepperObj.getCurrentStepIndex() === 5) {
				formSubmitButton.classList.add('d-none');
				formContinueButton.classList.add('d-none');
			} else {
				formSubmitButton.classList.remove('d-inline-block');
				formSubmitButton.classList.remove('d-none');
				formContinueButton.classList.remove('d-none');
			}
		});

		// Validation before going to next page
		stepperObj.on('kt.stepper.next', function (stepper) {
			console.log('stepper.next');

			// Validate form before change stepper step
			var validator = validations[stepper.getCurrentStepIndex() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						stepper.goNext();

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Lütfen Tüm Alanları Doldurun veya Seçin.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Tamam, anladım!",
							customClass: {
								confirmButton: "btn btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			} else {
				stepper.goNext();

				KTUtil.scrollTop();
			}
		});

		// Prev event
		stepperObj.on('kt.stepper.previous', function (stepper) {
			console.log('stepper.previous');

			stepper.goPrevious();
			KTUtil.scrollTop();
		});
	}

	var handleForm = function() {
		formSubmitButton.addEventListener('click', function (e) {
			// Validate form before change stepper step
			var validator = validations[3]; // get validator for last form

			validator.validate().then(function (status) {
				console.log('validated!');

				if (status == 'Valid') {
					// Prevent default button action
					e.preventDefault();

					// Disable button to avoid multiple click
					formSubmitButton.disabled = true;

					// Show loading indication
					formSubmitButton.setAttribute('data-kt-indicator', 'on');
                    var formData = new FormData();
                    formData.append("_token", csrf_token_new);
                    /*-------------------- Step 1 -----------------------*/
                    formData.append("category_id", $('[name="category_id"]').val());
                    formData.append("official_name", $('[name="official_name"]').val());
                    formData.append("phone", $('[name="phone"]').val());
                    formData.append("email", $('[name="email"]').val());
                    formData.append("password", $('[name="password"]').val());
                    formData.append("send_sms", $('[name="send_sms"]').val());
                    formData.append("name", $('[name="business_name"]').val());
                    formData.append("city_id", $('[name="city_id"]').val());
                    formData.append("district_id", $('[name="district_id"]').val());
                    formData.append("start_time", $('[name="start_time"]').val());
                    formData.append("end_time", $('[name="end_time"]').val());
                    formData.append("off_day", $('[name="off_day"]').val());
                    formData.append("appointment_range", $('[name="appointment_range"]').val());
                    formData.append("approve_type", $('[name="approve_type"]').val());
                    formData.append("year", $('[name="year"]').val());
                    formData.append("campaign_gender", $('[name="campaign_gender"]').val());
                    formData.append("personal_count", $('[name="personal_count"]').val());
                    formData.append("latitude", $('[name="latitude"]').val());
                    formData.append("longitude", $('[name="longitude"]').val());
                    formData.append("embed", $('[name="embed"]').val());
                    //formData.append("logo", $('[name="avatar"]')[0].files[0]);

					// Simulate form submission
					setTimeout(function() {
						// Hide loading indication
						formSubmitButton.removeAttribute('data-kt-indicator');

                        $.ajax({
                            url: '/dashboard/business',
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            dataType: "JSON",
                            success: function (res) {

                                Swal.fire({
                                    text: "Müşteri Başarılı Bir Şekilde Kayıt Edildi!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function (result) {
                                    form.reset(); // Reset form
                                    modal.hide(); // Hide modal
                                    submitButton.disabled = false;
                                    if ($.fn.DataTable.isDataTable('#datatable')) {
                                        $('#datatable').DataTable().ajax.reload();
                                    }
                                    if (result.isConfirmed) {

                                        // Enable submit button after loading

                                        // Redirect to customers list page
                                        //window.location = form.getAttribute("data-kt-redirect");
                                    }
                                });

                            },
                            error: function (xhr) {
                                var errorMessage = "<ul>";
                                xhr.responseJSON.errors.forEach(function (error) {
                                    errorMessage += "<li>" + error + "</li>";
                                });
                                errorMessage += "</ul>";

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Hata!',
                                    html: errorMessage,
                                    buttonsStyling: false,
                                    confirmButtonText: "Tamam",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        });

						// Enable button
						formSubmitButton.disabled = false;

						stepperObj.goNext();
					}, 2000);
				} else {
					Swal.fire({
						text: "Lütfen Tüm alanları doldurun/seçin.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});

	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					category_id: {
						validators: {
							notEmpty: {
								message: 'İşletme Kategorisi Seçilmelidir'
							}
						}
					},
                    /*avatar: {
                        validators: {
                            file: {
                                extension: 'png,jpg,jpeg',
                                type: 'image/jpeg,image/png',
                                message: 'Lütfen png, jpg veya jpeg dosya formatında bir logo seçiniz',
                            },
                        }
                    }*/
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 2
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'official_name': {
						validators: {
							notEmpty: {
								message: 'İşletme Sahibi Adı Gereklidir'
							}
						}
					},
					'phone': {
						validators: {
							notEmpty: {
								message: 'Telefon Numarası Gereklidir'
							}
						}
					},
					'email': {
                        validators: {
                            notEmpty: {
                                message: 'E-posta Alanı Gereklidir'
                            },
                            emailAddress: {
                                message: 'E-posta formatı hatalı'
                            }
                        }
					},
                    'password': {
						validators: {
							notEmpty: {
								message: 'Şifre Gereklidir'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 3
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'business_name': {
						validators: {
							notEmpty: {
								message: 'İşletme Adı Gereklidir'
							}
						}
					},

				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 4
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {

				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));
	}

	return {
		// Public Functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_create_account');

			if ( modalEl ) {
				modal = new bootstrap.Modal(modalEl);
			}

			stepper = document.querySelector('#kt_create_account_stepper');

			if ( !stepper ) {
				return;
			}

			form = stepper.querySelector('#kt_create_account_form');
			formSubmitButton = stepper.querySelector('[data-kt-stepper-action="submit"]');
			formContinueButton = stepper.querySelector('[data-kt-stepper-action="next"]');

			initStepper();
			initValidation();
			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCreateAccount.init();
});
