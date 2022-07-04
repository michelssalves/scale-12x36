function somarDatas(){
    var data1 = document.getElementById('data_hora3').value;
    var data2 =  document.getElementById('data_hora1').value;
    var data3 = new Date (data1);
    var data4 = new Date (data2);
    diferenca = (data4 - data3)/ (1000 * 60 * 60);
    retornaDataInicio('diferenca').value = diferenca
}
function retornaDataInicio(diferenca)
	{
	return document.getElementById(diferenca);
	}