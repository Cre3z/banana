@if(isset($guests_invite) && ($guests_invite[0]->rsvp == "no"))
<div id="qbootstrap-started" class="qbootstrap-bg" data-section="rsvp" style="background-image: url(website/images/invited.jpg);background-position: center;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-12 text-center section-heading svg-sm colored">
                    <img src="/website/images/flaticon/svg/005-two.svg" class="svg" alt="">
                    <h2>Jy is genooi!</h2>
                    <div class="row">
                    <div class="col-md-10 col-md-offset-1 subtext">
                        <h3>Kontroleer  en  bevestig  asseblief  jou  besonderhede  hier  onder.  Aanvaar  of  wys  die  uitnodiging  van  die  hand  voor  15  Augustus  2018.  Indien  jy  enige  probleme  met  die  uitnodiging  ervaar,  kontak  asseblief  vir  Suzaan.   </h3>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-10 col-md-offset-1">
                @if(!(count($guests_invite) > 1))
                <form class="form-inline" method="post" action="/guests_rsvp/{{ $token }}">
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Naam" value="{{ $guests_invite[0]->name }}" required name="name">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="E-pos" value="{{ $guests_invite[0]->email }}" required name="email">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <button type="submit" class="btn btn-default btn-block">Ek  woon  by!</button>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <button type="submit" class="btn btn-grey btn-block"><span class="glyphicon glyphicon-remove"></span></button>
                    </div>
                    <div class="col-sm-12 text-center subtext cursive">
                        <h3 class="text-white"><strong>Jammer,  geen  kinders. </strong>
                        <br><strong>Geskenk  idee: </strong>ʼn  Geldjie  vir  ons  neseiertjie  sal  al  te  fraai  wees. </h3>
                    </div>
                </form>
                @else
                <form class="form-inline" method="post" action="/guests_rsvp/{{ $token }}">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Jou Naam" value="{{ $guests_invite[1]->name }}" required name="name[]">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Jou e-pos" value="{{ $guests_invite[1]->email }}" required name="email">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 partner">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="name" class="form-control" id="name_2" placeholder="Jou metgesel se Naam" value="{{ $guests_invite[0]->name }}" name="name[]">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 partner">
                        <div class="form-group">
                            <label for="email" class="sr-only">Surname</label>
                            <input type="text" class="form-control" id="surname" placeholder="Jou metgesel se van" value="{{ $guests_invite[0]->surname }}" name="surname">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="control-group">
                            <label class="control control-checkbox">
                                Geen metgesel.
                                <input type="checkbox" name="no_partner" id="alone"/>
                                <div class="control_indicator"></div>
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="col-md-4 col-md-offset-6 col-sm-12">
                        <button type="submit" class="btn btn-default btn-block">Ek  woon  by!</button>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <button type="submit" class="btn btn-grey btn-block"><span class="glyphicon glyphicon-remove"></span></button>
                    </div>
                    <div class="col-sm-12 text-center subtext cursive">
                        <h3 class="text-white"><strong>Jammer,  geen  kinders. </strong>
                        <br><strong>Geskenk  idee: </strong>ʼn  Geldjie  vir  ons  neseiertjie  sal  al  te  fraai  wees. </h3>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@else
<div id="qbootstrap-started" class="qbootstrap-bg" data-section="rsvp" style="background-image: url(website/images/contact_us.jpg);background-position: center;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-12 text-center section-heading svg-sm colored">
                    <img src="/website/images/flaticon/svg/005-two.svg" class="svg" alt="">
                    <h2>Kontak Ons</h2>
                    <div class="row">
                    <div class="col-md-10 col-md-offset-1 subtext">
                        <h3>Indien  jy  enige  navrae  of  onsekerhede  het,  moet  nie  huiwer  om  ons  te  kontak  nie.    </h3>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-inline" action="/contact" method="post">
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="name" class="sr-only">Naam</label>
                            <input type="name" class="form-control" id="name" placeholder="Naam" name="name">
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="email" class="sr-only">E-pos</label>
                            <input type="email" class="form-control" id="email" placeholder="E-pos" name="email">
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="email" class="sr-only">Boodskap</label>
                            <textarea class="form-control" placeholder="Boodskap" name="message" rows="6"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-md-offset-8 col-sm-12">
                        <button type="submit" class="btn btn-default btn-block">Stuur Boodskap</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@if(isset($event))
<div id="qbootstrap-started" class="qbootstrap-bg" data-section="rsvp" style="background-image: url(website/images/friday.jpg);background-position: center;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-12 text-center section-heading svg-sm colored">
                    <img src="/website/images/flaticon/svg/005-two.svg" class="svg" alt="">
                    <h2>Friday</h2>
                    <div class="row">
                    <div class="col-md-10 col-md-offset-1 subtext">
                        <h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-inline">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <button type="submit" class="btn btn-default btn-block">I am Attending</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@if(isset($event))
<div id="qbootstrap-started" class="qbootstrap-bg" data-section="rsvp" style="background-image: url(website/images/sunday.jpg);background-position: center;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-12 text-center section-heading svg-sm colored">
                    <img src="/website/images/flaticon/svg/005-two.svg" class="svg" alt="">
                    <h2>Sunday</h2>
                    <div class="row">
                    <div class="col-md-10 col-md-offset-1 subtext">
                        <h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-inline">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <button type="submit" class="btn btn-default btn-block">I am Attending</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif