<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Suzaan & Jovan | Ons Troue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/website/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet">
    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;overflow:hidden;word-break:normal;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;overflow:hidden;word-break:normal;}
    </style>
</head>
<body>

    <table class="tg" style="width: 100%; max-width: 800px; margin: 0 auto; border-style: solid; border-width: 1px; border-color: #ccc;">
      <tr>
        <th class="tg-yw4l hero" style="background-image: url(http://www.suzaanjovan.co.za/website/images/cover_bg_3.jpg);background-position: center; height: 350px; color: #fff; position: relative;">
            <div class="overlay-text" style="position: absolute;bottom: 0;left: 0;width: 100%;background-color: #33333394;">
                <h1 class="holder" style="color: #fff;font-family: 'Clicker Script', cursive; font-size: 3em;"><span>Die Huweliksbesvestiging van</span> Suzaan &amp; J&#243;van</h1>
            </div>
        </th>
      </tr>
      <tr>
        <td class="tg-yw4l heading" style="padding: 20px 10px;">
            @if(count($guests) == 2)
            <h2 style="font-size: 2em; text-align: center;">Julle is uitgenooi!</h2>
            @else
            <h2 style="font-size: 2em; text-align: center;">Jy is uitgenooi!</h2>
            @endif
        </td>
      </tr>
      <tr>
        <td class="tg-yw4l info" style="padding: 20px 10px;">
        @if(count($guests) == 2)
            @if($guests[0]->plus_one == "couple")
            <p>Beste {{$guests[0]->name}} & {{$guests[1]->name}}</p>
            @else
            <p>Beste {{$guests[1]->name}}</p>
            @endif
        @else
            <p>Beste {{$guests[0]->name}}</p>
        @endif
            <p>Jy/Julle  word  hartlik  uitgenooi  na  ons  huweliksbevestiging!  Dit  sal  vir  ons  ‘n  eer  en  ‘n  voorreg  wees  as  jy  dit  saam  met  ons  kan  deel.  ‘n  Groot  dag  kan  net  meer  spesiaal  wees  met  jou  daar.  </p>
            <p><strong>Datum: </strong> 15 Desember 2018</p>
            <p><strong>Tyd: </strong> 16:00 vir 16:30</p>
            <p><strong>Waar: </strong> 30  Kerkstraat,  Tulbagh,  oorkant  29  Restuarant </p>
            <p><strong>RSVP: </strong> 15 Augustus 2018</p>
            <p><strong>Kleredrag: </strong> Semi-formeel  (geen  jeans).  Tulbagh  is  lekker  warm  in  Desember,  so  trek  maar  koel  aan.  Dames,  ongelukkig  geen  hakskoene  nie,  dit  gaan  die  groengrasveld  van  die  laan  beskadig.   </p>
            <p><strong>Geskenk  idee: </strong>ʼn  Geldjie  vir  ons  neseiertjie  sal  al  te  fraai  wees. </p>
            <p><strong>Nota: </strong> Jammer, geen kinders.</p>
            <p>Aangesien daar waterbeperkings is en ons dus nie meer ons bome kan water gee nie, is daar minder bome beskikbaar vir papier uitnodigings. So, in ons strewe om die natuur te help beskerm het ons besluit om ons uitnodigings digitaal te maak. Volg die onderstaande skakel wat na ons trou webblad gaan, jou uitnodiging kan aan die heel onderkant gevind word. Ons het dit vir jou maklik gemaak en reeds al jou besondehede ingevul, so al wat jy moet doen is die inligiting bevestig en die uitnodiging aanvaar. </p>
            @if(count($guests) == 2 && $guests[1]->plus_one == "yes")
            <p>Jou uitnodiging sluit 'n metgesel in. Ons vra dat jy jou metgesel se naam en van verskaf indien jy die uitnodiging so aanvaar. In die geval dat jy onseker is wie jou metgesel gaan wees, los asseblief die verskafte bewoording in die spasie en bevestig met Suzaan teen 1 November 2018 wie jou metgesel gaan wees. Indien jy nie 'n metgesel gaan bring nie, kies asseblief die "geen metgesel" opsie op die uitnodiging.</p>
            @endif
            <p>Indien jy enige navrae het, kontak gerus vir Cecilia van Zyl <strong>081 390 6814</strong> of vir Suzaan van Zyl by <strong>072 434 3546</strong>. Jy kan ook met ons in kontak tree via die webwerf.</p>
            <p>Volg asseblief die onderstaande skakel om die uitnodiging te besigtig.</p>
            
        </td>
      </tr>
      <tr>
        <td class="tg-yw4l link" style="text-align: center; height: 100px;">
            <a class="btn btn-default" style="height: 54px;border: none !important;background: #001f54;color: #fff;font-size: 16px;text-transform: uppercase;font-weight: 400; padding: 20px 40px; border-radius: 6px; text-decoration: none;" href="http://www.suzaanjovan.co.za/{{ $guests[1]->token }}">Besigtig uitnodiging</a>
            <br>
        </td>
      </tr>
      <tr>
        <td class="tg-yw4l footer" style="background-position: top; height: 100px; position: relative;background-color: #001f54;"></td>
      </tr>
    </table>
</body>
</html>