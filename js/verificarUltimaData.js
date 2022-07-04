$("#equipes").on("change", function(){
    $.ajax({
        url: 'verificarUltimaData.php',
        type: 'POST',
        dataType: "json",
        data:{id:$("#equipes").val()},

        success: function(json)
        {   
            $("#data_hora3").val(json.data_hora_back);
            $("#data_hora_front").val(json.data_hora_front);
         },
        error: function(data)
        {
            $("#data_hora3").val("Houve um erro ao carregar");
        }
    });
});