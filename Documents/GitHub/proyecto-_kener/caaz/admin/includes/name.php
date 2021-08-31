
<SCRIPT LANGUAGE="JavaScript">
currentTime=new Date();
//getHour() function will retrieve the hour from current time
if(currentTime.getHours()<12)
document.write("<b>Buenos Días </b>");
else if(currentTime.getHours()<18)
document.write("<b>Buenas Tardes </b>");
else 
document.write("<b> Buenas Noches </b>");
</SCRIPT>
<?php echo $_SESSION['name'].str_repeat('&nbsp;', 1).$_SESSION['surname']?>