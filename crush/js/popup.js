﻿status="Doto"
var a=new Array(),n=""
a[1]='T';
a[2]='à';
a[3]='o';
a[4]=' ';
a[5]='l';
a[6]='a';
a[7]='o';
a[8]=' ';
a[9]='q';
a[10]='u';
a[11]='á';
a[12]=' ';
a[13]='đ';
a[14]='i';
a[15]='';
a[16]='';
a[17]='';
a[18]='';
a[19]='';
a[20]='';
a[21]='';
a[22]='';
a[23]='';
a[24]='';
a[25]='';
a[26]='';
a[27]='';
a[28]='';
a[29]='';
a[30]='';
a[31]='';
a[32]='';
a[33]='';
a[34]='';
a[35]='';
a[36]='';
a[37]='';
a[38]='';
a[39]='';
a[40]='';
a[41]='';
a[42]='';
a[42]=' ';

function one()
{
t=document.f.txt.value
j=t.length
if(j>0)
{
for(var i=1;i<=j;i++)
{
n=n+a[i]
if(i==48)
{
document.f.txt.value=""
n=""
}
}
}
document.f.txt.value=n
n=""
setTimeout("one()",1)
}
function s()
{
}
function on()
{
one()
}

        $(document).ready(function() {
            $('#k').hide();
            $('h1').click(function() {
                $('.active').removeClass('active');
                $('#k').slideUp('fast');
                if($(this).next('#k').is(':hidden') == true) {
                $(this).addClass('active');
                $(this).next('#k').slideDown('fast');
                }
            });
        });
					function Yeu()
					{
					$("#divResult").fadeOut(0);
					$("#divResult").html("</br><h2>Kệ bạn chứ</h2>");
					$("#divResult").fadeIn(2000,function()
							{
							$("#divResult2").fadeOut(0);
							$("#divResult2").html("<p>Hahaha🤣</p></br>");
							$("#divResult2").fadeIn(2000,function()
									{
									$("#divResult3").fadeOut(0);
									$("#divResult3").html("<p>🤣🤣🤣</p></br>");
									$("#divResult3").fadeIn(2000);
									}
								);
							}
						);
					}
				