"use strict";

// Class definition
var KTModalActivityAdd = function () {
    var submitButton;
    var cancelButton;
	var closeButton;
    var validator;
    var form;
    var modal;

    // Init form inputs
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
                    'name': {
						validators: {
							notEmpty: {
								message: 'Başlık alanı gereklidir'
							}
						}
					},
                    'sponsor_image': {
						validators: {
							notEmpty: {
								message: 'Sponsor Görseli'
							}
						}
					},

					'link': {
						validators: {
							notEmpty: {
								message: 'Link alanı gereklidir'
							}
						}
					},
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
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {

					if (status == 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable submit button whilst loading
						submitButton.disabled = true;

						setTimeout(function() {
							submitButton.removeAttribute('data-kt-indicator');
                            var formData = new FormData();
                            formData.append("_token", csrf_token);
                            formData.append("name", $('[name="name"]').val());
                            formData.append("is_main_sponsor", $('[name="is_main_sponsor"]').val());
                            formData.append("sponsor_image", $('[name="sponsor_image"]')[0].files[0]);
                            formData.append("link", $('[name="link"]').val());
                            formData.append("sponsor_text", $('[name="sponsor_text"]').val());
                            formData.append("activity_id", $('[name="activity_id"]').val());

                            $.ajax({
                                url: '/dashboard/activitySponsor',
                                type: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                dataType: "JSON",
                                success: function (res) {
                                        Swal.fire({
                                            text: "Etkinlik Başarılı Bir Şekilde Kayıt Edildi!",
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

						}, 2000);
					} else {
						Swal.fire({
							text: "Bazı Sorunlar Oluştu Lütfen Zorunlu Alanları Kontrol Ediniz.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "İşlemi İptal Etmek İstediğinize Eminmisiniz?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Evet, İptal Et!",
                cancelButtonText: "Hayır, Devam Et",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "İşlem İptal Edilmedi!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Tamam, devam et!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

		closeButton.addEventListener('click', function(e){
			e.preventDefault();
            Swal.fire({
                text: "İşlemi İptal Etmek İstediğinize Eminmisiniz?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Evet, İptal Et!",
                cancelButtonText: "Hayır, Devam Et",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "İşlem İptal Edilmedi!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Tamam, devam et!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });

		})
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_sponsor_modal'));

            form = document.querySelector('#kt_modal_add_activity_sponsor_form');
            submitButton = form.querySelector('#kt_modal_add_activity_sponsor_submit');
            cancelButton = form.querySelector('#kt_modal_add_activity_sponsor_cancel');
			closeButton = document.querySelector('#kt_modal_add_activity_sponsor_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalActivityAdd.init();
});
