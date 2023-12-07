"use strict";

// Class definition
var KTModalFaqAdd = function () {
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
					'question[de]': {
						validators: {
							notEmpty: {
								message: 'Soru (de) alanı gereklidir'
							}
						}
					},
                    'question[en]': {
                        validators: {
                            notEmpty: {
                                message: 'Soru (en) alanı gereklidir'
                            }
                        }
                    },
                    'question[es]': {
                        validators: {
                            notEmpty: {
                                message: 'Soru (es) alanı gereklidir'
                            }
                        }
                    },
                    'question[fr]': {
                        validators: {
                            notEmpty: {
                                message: 'Soru (fr) alanı gereklidir'
                            }
                        }
                    },
                    'question[it]': {
                        validators: {
                            notEmpty: {
                                message: 'Soru (it) alanı gereklidir'
                            }
                        }
                    },
                    'question[tr]': {
                        validators: {
                            notEmpty: {
                                message: 'Soru (tr) alanı gereklidir'
                            }
                        }
                    },

                    'answer[de]': {
                        validators: {
                            notEmpty: {
                                message: 'Cevap (de) alanı gereklidir'
                            }
                        }
                    },
                    'answer[en]': {
                        validators: {
                            notEmpty: {
                                message: 'Cevap (en) alanı gereklidir'
                            }
                        }
                    },
                    'answer[es]': {
                        validators: {
                            notEmpty: {
                                message: 'Cevap (es) alanı gereklidir'
                            }
                        }
                    },
                    'answer[fr]': {
                        validators: {
                            notEmpty: {
                                message: 'Cevap (fr) alanı gereklidir'
                            }
                        }
                    },
                    'answer[it]': {
                        validators: {
                            notEmpty: {
                                message: 'Cevap (it) alanı gereklidir'
                            }
                        }
                    },
                    'answer[tr]': {
                        validators: {
                            notEmpty: {
                                message: 'Cevap (tr) alanı gereklidir'
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

                            formData.append("question[de]", $('[name="question[de]"]').val());
                            formData.append("question[en]", $('[name="question[en]"]').val());
                            formData.append("question[es]", $('[name="question[es]"]').val());
                            formData.append("question[fr]", $('[name="question[fr]"]').val());
                            formData.append("question[it]", $('[name="question[it]"]').val());
                            formData.append("question[tr]", $('[name="question[tr]"]').val());

                            formData.append("answer[de]", $('[name="answer[de]"]').val());
                            formData.append("answer[en]", $('[name="answer[en]"]').val());
                            formData.append("answer[es]", $('[name="answer[es]"]').val());
                            formData.append("answer[fr]", $('[name="answer[fr]"]').val());
                            formData.append("answer[it]", $('[name="answer[it]"]').val());
                            formData.append("answer[tr]", $('[name="answer[tr]"]').val());

                            formData.append("category_id", $('[name="category_id"]').val());

                            $.ajax({
                                url: '/dashboard/businessFaq',
                                type: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                dataType: "JSON",
                                success: function (res) {
                                        Swal.fire({
                                            text: "SSS Başarılı Bir Şekilde Kayıt Edildi!",
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
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_customer'));

            form = document.querySelector('#kt_modal_add_customer_form');
            submitButton = document.querySelector('#kt_modal_add_customer_submit');
            cancelButton = document.querySelector('#kt_modal_add_customer_cancel');
			closeButton = document.querySelector('#kt_modal_add_customer_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalFaqAdd.init();
});
