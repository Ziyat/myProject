 $(document).ready(function() {

if(jQuery("#text_ru").length)
{
  var text_ru, text_uz;
  text_ru = new nicEditor({fullPanel : true}).panelInstance('text_ru',{hasPanel : true});
  text_uz = new nicEditor({fullPanel : true}).panelInstance('text_uz',{hasPanel : true});
}
  
	
  $('#status').material_select();
  $('#role').material_select();
 	
    	$('#status').change(function() {
            var str = "";
            $( "select option:selected" ).each(function() {
            	
            	if($(this).attr('id') === 'rejected')
            	{
             		$('#status').parent().parent().next().html('<th>Причина отклонения</th><td><input id="cause" name="cause"></td>');

            	}else{
            		if($('#cause').attr('name') !== undefined)
            		{
            			$('#status').parent().parent().next().html('');
            		}
             		

            	}

             	$('#submit').removeClass('disabled');
             	
            });
        });

if(jQuery("#status-total").length)
{
    var statusTotal = $('#status-total').text();
    var status0 = $('#status-0').text();
    var status1 = $('#status-1').text();
    var status2 = $('#status-2').text();
    var status3 = $('#status-3').text();
    var statusTotalText = $('#status-total').parent().text();
    var status0Text = $('#status-0').parent().text();
    var status1Text = $('#status-1').parent().text();
    var status2Text = $('#status-2').parent().text();
    var status3Text = $('#status-3').parent().text();
    new Chartist.Bar('.ct-chart', {
      labels: [statusTotalText, status0Text, status1Text, status2Text, status3Text],
      series: [statusTotal, status0, status1, status2, status3]
        }, {
          distributeSeries: true
        });
}

    $('comment_fio, comment_text').characterCounter();

function str_rand() {
    var result       = '';
    var words        = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUOPLKJHGFDSAZXCVBNM}{[]_@#$%&*';
    var max_position = words.length - 1;
     for( i = 0; i < 10; ++i ) {
       position = Math.floor ( Math.random() * max_position );
       result = result + words.substring(position, position + 1);
     }
    return result;
  }
    $('#showPassword').click(function(){
        var inputPsw = $('#password');
        if (inputPsw.attr('type') == 'password') {
          document.getElementById('password').setAttribute('type', 'text');
          document.getElementById('repassword').setAttribute('type', 'text');
         $('#eye').text('visibility_off');
        } else {
          document.getElementById('password').setAttribute('type', 'password');
          document.getElementById('repassword').setAttribute('type', 'password');
          $('#eye').text('visibility');
        }
    });
    
    $('#generatePassword').click(function() {
            document.getElementById('password').setAttribute('type', 'text');
            document.getElementById('repassword').setAttribute('type', 'text');
            var password = str_rand();
            $('#password').attr('value', password);
            $('#repassword').attr('value', password);
          });
    $("#birth_day").mask('0000-00-00');

function transliterate(word) {
    var A = {};
    var result = '';

    A["Ё"] = "YO";
    A["Й"] = "I";
    A["Ц"] = "TS";
    A["У"] = "U";
    A["К"] = "K";
    A["Е"] = "E";
    A["Н"] = "N";
    A["Г"] = "G";
    A["Ш"] = "SH";
    A["Щ"] = "SCH";
    A["З"] = "Z";
    A["Х"] = "H";
    A["Ъ"] = "'";
    A["ё"] = "yo";
    A["й"] = "i";
    A["ц"] = "ts";
    A["у"] = "u";
    A["к"] = "k";
    A["е"] = "e";
    A["н"] = "n";
    A["г"] = "g";
    A["ш"] = "sh";
    A["щ"] = "sch";
    A["з"] = "z";
    A["х"] = "h";
    A["ъ"] = "'";
    A["Ф"] = "F";
    A["Ы"] = "I";
    A["В"] = "V";
    A["А"] = "A";
    A["П"] = "P";
    A["Р"] = "R";
    A["О"] = "O";
    A["Л"] = "L";
    A["Д"] = "D";
    A["Ж"] = "ZH";
    A["Э"] = "E";
    A["ф"] = "f";
    A["ы"] = "i";
    A["в"] = "v";
    A["а"] = "a";
    A["п"] = "p";
    A["р"] = "r";
    A["о"] = "o";
    A["л"] = "l";
    A["д"] = "d";
    A["ж"] = "zh";
    A["э"] = "e";
    A["Я"] = "YA";
    A["Ч"] = "CH";
    A["С"] = "S";
    A["М"] = "M";
    A["И"] = "I";
    A["Т"] = "T";
    A["Ь"] = "'";
    A["Б"] = "B";
    A["Ю"] = "YU";
    A["я"] = "ya";
    A["ч"] = "ch";
    A["с"] = "s";
    A["м"] = "m";
    A["и"] = "i";
    A["т"] = "t";
    A["ь"] = "'";
    A["б"] = "b";
    A["ю"] = "yu";
    A[" "] = "_";

  for (var i = 0; i < word.length; i++) {
    var c = word.charAt(i);

    result += A[c] || c;
  }

  return result;
}

$('#nameRegister').keyup(function(){
  var thisVal = $(this).val();
  var trans = transliterate(thisVal);
  trans = (trans.toLowerCase());
  $('#login').val(trans);
});
       
  });