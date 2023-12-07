"use strict";

// Class definition
var KTModalCustomersAdd = function () {
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
                    'title': {
						validators: {
							notEmpty: {
								message: 'Başlık alanı gereklidir'
							}
						}
					},
                    'description': {
						validators: {
							notEmpty: {
								message: 'Açıklama'
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
					'type': {
						validators: {
							notEmpty: {
								message: 'Tür alanı gereklidir'
							}
						}
					},
                    'avatar': {
                        validators: {
                            notEmpty: {
                                message: 'Reklam Görseli alanı gereklidir'
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
                            formData.append("product_name[de]", $('[name="product_name[de]"]').val());
                            formData.append("product_name[en]", $('[name="product_name[en]"]').val());
                            formData.append("product_name[es]", $('[name="product_name[es]"]').val());
                            formData.append("product_name[fr]", $('[name="product_name[fr]"]').val());
                            formData.append("product_name[it]", $('[name="product_name[it]"]').val());
                            formData.append("product_name[tr]", $('[name="product_name[tr]"]').val());

                            formData.append("price[de]", $('[name="price[de]"]').val());
                            formData.append("price[en]", $('[name="price[en]"]').val());
                            formData.append("price[es]", $('[name="price[es]"]').val());
                            formData.append("price[fr]", $('[name="price[fr]"]').val());
                            formData.append("price[it]", $('[name="price[it]"]').val());
                            formData.append("price[tr]", $('[name="price[tr]"]').val());

                            formData.append("link", $('[name="link"]').val());
                            formData.append("category_id", $('[name="category_id"]').val());
                            formData.append("image", $('[name="ads_image"]')[0].files[0]);

                            $.ajax({
                                url: '/dashboard/productAdvert',
                                type: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                dataType: "JSON",
                                success: function (res) {

                                        Swal.fire({
                                            text: "Ürün Reklamı Başarılı Bir Şekilde Kayıt Edildi!",
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
            submitButton = form.querySelector('#kt_modal_add_customer_submit');
            cancelButton = form.querySelector('#kt_modal_add_customer_cancel');
			closeButton = form.querySelector('#kt_modal_add_customer_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalCustomersAdd.init();
});
