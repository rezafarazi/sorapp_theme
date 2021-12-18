var Toggle=0;
var Top=0;
var Down=0;
var Down_location=55;

function Onclick_Mobile_Menu_Button(e)
{
    var Top_=document.getElementById("Mobile_Menu_Top_Border");
    var Down_=document.getElementById("Mobile_Menu_Down_Border");

    if(Toggle==0)
    {
        var Intervl=setInterval(function ()
        {

            if(Top<46)
            {

                if(Down_location>28)
                {
                    Down_.style.top=Down_location+"%";
                    Down_location--;
                }

                Top_.style.transform = "rotate(" + Top + "deg)";
                Down_.style.transform = "rotate(" + Down + "deg)";
                Top++;
                Down--;
            }
            else
            {
                clearInterval(Intervl);
            }

        },1);

        document.getElementById("Menu_Item_Border").style.display='block';
        document.getElementById("Menu").style.display='block';
        // document.getElementById("Menu").style.background="#000";
        // document.getElementById("Menu").style.position="fixed";

        Toggle=1;

    }
    else
    {

        var Intervall=setInterval(function ()
        {

            if(Top>0)
            {

                if(Down_location<60)
                {
                    Down_.style.top=Down_location+"%";
                    Down_location++;
                }

                Top_.style.transform = "rotate(" + Top + "deg)";
                Down_.style.transform = "rotate(" + Down + "deg)";
                Top--;
                Down++;

            }
            else
            {
                clearInterval(Intervall);
            }

        },1);

        document.getElementById("Menu_Item_Border").style.display='none';
        document.getElementById("Menu").style.display='none';
        // document.getElementById("Menu").style.background="none";
        // document.getElementById("Menu").style.position="absolute";

        Toggle=0;
    }

}





function Search_ly(e)
{
    document.getElementById('Search_Ly').style.display="block";
}





function Close_Search(e)
{
    document.getElementById('Search_Ly').style.display="none";
}





