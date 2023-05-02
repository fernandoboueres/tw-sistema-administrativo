$('.celular').mask('(00) 00000-0000');
$('.phone').mask('(00) 0000-0000');
$('.cep').mask('00000-000');

$('.cpf_cnpj').on('input', function(){
    let field = $('.cpf_cnpj');
    
    try{field.unmask()} catch(e){console.log(e);}

    if(field.val().length < 11){
        field.mask('000.000.000-00');
    } else{
        field.mask('00.000.000/0000-00');
    }
    
    setTimeout(
        function(){
            this.selectionStart = this.selectionEnd = 10000;
        }, 
        0
    )

    let currentValue = field.val();
    field.val('');
    field.val(currentValue);
});