
$(".dinheiro").mask({thousands: '.', decimal: ',', allowZero: true, suffix: ''});
$(".inteiro").maskMoney({thousands: '.', decimal: '', allowZero: false, suffix: ''});
//$('.inteiro').mask("9.999", {reverse: true});

//$("input.dataFormat").inputmask("dd/mm/yyyy");

$('.CNPJ').mask('99.999.999/9999-99');

$(".inteiros").bind("keyup blur focus", function (e) {
    e.preventDefault();
    var expre = /[^\d]/g;
    $(this).val($(this).val().replace(expre, ''));
}); 
$("#campoTelefone").mask("(999) 9999-9999");

// Supondo há necessidade de uma máscara para utilizar todos os tipos de caractéres no formato XXX-XXXX:

$("#campopassword").mask("***-****");

function num(dom) {
    dom.value = dom.value.replace(/\D/g, '');
}