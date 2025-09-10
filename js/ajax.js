

$('.leave-comment').submit(function(event){

    event.preventDefault();
    
    //  data get

    var data={};
    
    // 1-
    // {
    //     name : $('input[name="name"]').val()
    // } 

    // 2-
    $('.leave-comment  input, .leave-comment textarea').each(function(index , item){

        data[$(item).attr('name')] =$(item).val();

    });
 
    console.log(data);

    $.post("function/addMessage.php" , data , function(data){

        $('.newData').append(data);
        $('form input ,form textarea').val('');

    })

})