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
                            formData.append("title[de]", $('[name="title[de]"]').val());
                            formData.append("title[en]", $('[name="title[en]"]').val());
                            formData.append("title[es]", $('[name="title[es]"]').val());
                            formData.append("title[fr]", $('[name="title[fr]"]').val());
                            formData.append("title[it]", $('[name="title[it]"]').val());
                            formData.append("title[tr]", $('[name="title[tr]"]').val());

                            formData.append("description[de]", CKEDITOR.instances.kt_docs_ckeditor_classic_de.getData());
                            formData.append("description[en]", CKEDITOR.instances.kt_docs_ckeditor_classic_en.getData());
                            formData.append("description[es]", CKEDITOR.instances.kt_docs_ckeditor_classic_es.getData());
                            formData.append("description[fr]", CKEDITOR.instances.kt_docs_ckeditor_classic_fr.getData());
                            formData.append("description[it]", CKEDITOR.instances.kt_docs_ckeditor_classic_it.getData());
                            formData.append("description[tr]", CKEDITOR.instances.kt_docs_ckeditor_classic_tr.getData());

                            formData.append("embed_code", $('[name="embed_code"]').val());
                            formData.append("hotel_name", $('[name="hotel_name"]').val());
                            formData.append("city_id", $('[name="city_id"]').val());
                            formData.append("phone", $('[name="phone"]').val());
                            formData.append("activity_date", $('[name="activity_date"]').val());

                            var activityGalleryInput = $('[name="activity_gallery"]')[0];

                            for (var i = 0; i < activityGalleryInput.files.length; i++) {
                                formData.append('activity_gallery[]', activityGalleryInput.files[i]);
                            }
                            var activitySliderInput = $('[name="activity_slider"]')[0];

                            for (var j = 0; j < activitySliderInput.files.length; j++) {
                                formData.append('activity_slider[]', activitySliderInput.files[j]);
                            }
                            $.ajax({
                                url: '/dashboard/activity',
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
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_activity'));

            form = document.querySelector('#kt_modal_add_activity_form');
            submitButton = form.querySelector('#kt_modal_add_activity_submit');
            cancelButton = form.querySelector('#kt_modal_add_activity_cancel');
			closeButton = form.querySelector('#kt_modal_add_activity_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTModalActivityAdd.init();
});
