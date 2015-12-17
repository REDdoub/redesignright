$('.custom-drop').click(function(){
    $('.custom-form-group').removeClass('hidden');
    $('.custom-label').html('');
    if($(this).val() == 'Referral'){
        $('.custom-label').html('Who Referred You:');
    }else if($(this).val() == 'ProfessionalNetwork'){
        $('.custom-label').html('Which Professional Network:');
    }else if($(this).val() == 'Other'){
        $('.custom-label').html('Please Explain:');
    }
});

$('.no-custom-drop').click(function(){
    $('.custom-form-group').addClass('hidden');
});

