<?php
$http = $_SERVER['REQUEST_URI'];
$http = strstr($http, "join");
if(strpos($http, '?') != false){
    $http = str_replace(strstr($http, "?"),'', $http);
}
if($http === "join/" or $http === "join/index.php"){
?>
<p class="text">Join as<select class="select1" name="joinas" id="joinUsSelect" onchange="joinAs();">
                <option name="joinas" value="0" selected>Choose</option>
                <optgroup label="Player">
                    <option name="joinas" value="ow">Overwatch Team</option>
                    <option name="joinas" value="r6s">R6S Team</option>
                    <option name="joinas" value="fortnite">Fortnite Team</option>
                    <option name="joinas" value="rl">Rocket League Team</option>
                </optgroup>
                <option name="joinas" value="programmer">Programmer</option>
                <option name="joinas" value="designer">Designer</option>
                <option name="joinas" value="editor">Editor</option>
             </select></p>
              <!-- overwatch -->
            <div class="JoinAsForm animated fadeInLeft">
                <div class="ow">
                    <div class="partOne">
                        <p class="text">Battle/PS4/xBox ID <input name="battleid1" type="text" placeholder="bot#0000" autocomplete='off'></p>
                        <p class="text" id="">Your SR <input name="sr1" type="text" placeholder="0000" autocomplete='off'></p>
                    </div>
                    <div class="partTwo">
                        <p class="text">Your Level <input name="level1" type="text" placeholder="1232" autocomplete='off'></p>
                        <p class="text">Your Main <select name="your-main1" class="select1">
                            <option name="your-main1" value="0" selected>Choose</option>
                            <option name="your-main1" value="Ana">Ana</option>
                            <option name="your-main1" value="Ashe">Ashe</option>
                            <option name="your-main1" value="Bastion">Bastion</option>
                            <option name="your-main1" value="Brigitte">Brigitte</option>
                            <option name="your-main1" value="D.va">D.va</option>
                            <option name="your-main1" value="Doomfist">Doomfist</option>
                            <option name="your-main1" value="Genji">Genji</option>
                            <option name="your-main1" value="Hanzo">Hanzo</option>
                            <option name="your-main1" value="Junkrat">Junkrat</option>
                            <option name="your-main1" value="Lúcio">Lúcio</option>
                            <option name="your-main1" value="McCree">McCree</option>
                            <option name="your-main1" value="Mei">Mei</option>
                            <option name="your-main1" value="Mercy">Mercy</option>
                            <option name="your-main1" value="Moira">Moira</option>
                            <option name="your-main1" value="Orisa">Orisa</option>
                            <option name="your-main1" value="Pharah">Pharah</option>
                            <option name="your-main1" value="Reaper">Reaper</option>
                            <option name="your-main1" value="Reinhardt">Reinhardt</option>
                            <option name="your-main1" value="Roadhog">Roadhog</option>
                            <option name="your-main1" value="Soldier: 76">Soldier: 76</option>
                            <option name="your-main1" value="Sombra">Sombra</option>
                            <option name="your-main1" value="Symmetra">Symmetra</option>
                            <option name="your-main1" value="Torbjörn">Torbjörn</option>
                            <option name="your-main1" value="Tracer">Tracer</option>
                            <option name="your-main1" value="Widowmaker">Widowmaker</option>
                            <option name="your-main1" value="Winston">Winston</option>
                            <option name="your-main1" value="Wrecking Ball">Wrecking Ball</option>
                            <option name="your-main1" value="Zarya">Zarya</option>
                            <option name="your-main1" value="Zenyatta">Zenyatta</option>
                        </select></p>
                    </div>
                    <div class="partThree">
                        <p class="text">Platform <select name="platform1" class="select1">
                            <option name="platform1" value="0" selected>Choose</option>
                            <option name="platform1" value="pc">PC</option>
                            <option name="platform1" value="ps4">PS4</option>
                            <option name="platform1" value="xbox">xBox</option>
                        </select></p>
                    </div>
                    </div>
                                                                                        <!-- rainbow six siege -->
                <div class="r6s animated fadeInLeft">
                    <div class="partOne">
                        <p class="text">Steam/Uplay/PS4/xBox ID <input name="r6sid" type="text" placeholder="IKing4Ever1"  autocomplete='off'></p>
                        <p class="text">Your Rank <select name="your-rank1" class="select1">
                            <option name="your-rank1" value="0" selected>None</option>
                            <option name="your-rank1" value="Copper I" >Copper I</option>
                            <option name="your-rank1" value="Copper II" >Copper II</option>
                            <option name="your-rank1" value="Copper III" >Copper III</option>
                            <option name="your-rank1" value="Copper IV" >Copper IV</option>
                            <option name="your-rank1" value="Bronze I" >Bronze I</option>
                            <option name="your-rank1" value="Bronze II" >Bronze II</option>
                            <option name="your-rank1" value="Bronze III" >Bronze III</option>
                            <option name="your-rank1" value="Bronze IV" >Bronze IV</option>
                            <option name="your-rank1" value="Silver I" >Silver I</option>
                            <option name="your-rank1" value="Silver II" >Silver II</option>
                            <option name="your-rank1" value="Silver III" >Silver III</option>
                            <option name="your-rank1" value="Silver IV" >Silver IV</option>
                            <option name="your-rank1" value="Gold I" >Gold I</option>
                            <option name="your-rank1" value="Gold II" >Gold II</option>
                            <option name="your-rank1" value="Gold III" >Gold III</option>
                            <option name="your-rank1" value="Gold IV" >Gold IV</option>
                            <option name="your-rank1" value="Platinum I" >Platinum I</option>
                            <option name="your-rank1" value="Platinum II" >Platinum II</option>
                            <option name="your-rank1" value="Platinum III" >Platinum III</option>
                            <option name="your-rank1" value="Diamond" >Diamond</option>
                        </select></p>
                    </div>
                    <div class="partTwo">
                        <p class="text">Your Level <input name="level2" type="text" placeholder="62"  autocomplete='off'></p>
                        <p class="text">Platform <select name="platform2" class="select1">
                            <option name="platform2" value="0" selected>Choose</option>
                            <option name="platform2" value="pc">PC</option>
                            <option name="platform2" value="ps4">PS4</option>
                            <option name="platform2" value="xbox">xBox</option>
                        </select></p>
                    </div>
                </div>
                                                                                            <!-- fortnite -->
                <div class="fortnite animated fadeInLeft">
                    <div class="partOne">
                    <p class="text">Epic ID <input name="epicid" type="text" placeholder="IKing4Ever1"  autocomplete='off'></p>
                    <p class="text">Your Kills <input name="kills" type="text" placeholder="3213"  autocomplete='off'></p>
                    </div>
                    <div class="partTwo">
                    <p class="text">Your Wins <input name="wins" type="text" placeholder="600"  autocomplete='off'></p>
                    <p class="text">Your K/D <input name="kd" type="text" placeholder="3.2"  autocomplete='off'></p>
                    </div>
                </div>
                                                                                            <!-- rocket league -->
                <div class="rl animated fadeInLeft">
                    <div class="partOne">
                        <p class="text">Steam/PS4/xBox ID <input name="r6sid1" type="text" placeholder="IKing4Ever1"  autocomplete='off'></p>
                        <p class="text">Your Level <input name="level3" type="text" placeholder="62"  autocomplete='off'></p>
                    </div>
                    <div class="partTwo">
                        <p class="text">Platform <select name="platform3" class="select1">
                            <option name="platform3" value="0" selected>Choose</option>
                            <option name="platform3" value="pc">PC</option>
                            <option name="platform3" value="ps4">PS4</option>
                            <option name="platform3" value="xbox">xBox</option>
                        </select></p>
                        <p style="margin-left: 108px;" class="text">Your Rank in 1v1 Solo Duel<select name="solo-duel" class="select1" >
                            <option name="solo-duel" value="0" selected>None</option>
                            <option name="solo-duel" value="Bronze I" >Bronze II</option>
                            <option name="solo-duel" value="Bronze III" >Bronze III</option>
                            <option name="solo-duel" value="Silver I" >Silver I</option>
                            <option name="solo-duel" value="Silver II" >Silver II</option>
                            <option name="solo-duel" value="Silver III" >Silver III</option>
                            <option name="solo-duel" value="Gold I" >Gold I</option>
                            <option name="solo-duel" value="Gold II" >Gold II</option>
                            <option name="solo-duel" value="Gold III" >Gold III</option>
                            <option name="solo-duel" value="Platinum I" >Platinum I</option>
                            <option name="solo-duel" value="Platinum II" >Platinum II</option>
                            <option name="solo-duel" value="Platinum III" >Platinum III</option>
                            <option name="solo-duel" value="Diamond I" >Diamond I</option>
                            <option name="solo-duel" value="Diamond II" >Diamond II</option>
                            <option name="solo-duel" value="Diamond III" >Diamond III</option>
                            <option name="solo-duel" value="Champion I" >Champion I</option>
                            <option name="solo-duel" value="Champion II" >Champion II</option>
                            <option name="solo-duel" value="Champion III" >Champion III</option>
                            <option name="solo-duel" value="Grand Champion" >Grand Champion</option>
                        </select></p>
                    </div>
                    <div class="partThree">
                        <p class="text">Your Rank in 2v2 Doubles<select name="doubles" class="select1">
                            <option name="doubles" value="0" selected>None</option>
                            <option name="doubles" value="Bronze I" >Bronze I</option>
                            <option name="doubles" value="Bronze II" >Bronze II</option>
                            <option name="doubles" value="Bronze III" >Bronze III</option>
                            <option name="doubles" value="Silver I" >Silver I</option>
                            <option name="doubles" value="Silver II" >Silver II</option>
                            <option name="doubles" value="Silver III" >Silver III</option>
                            <option name="doubles" value="Gold I" >Gold I</option>
                            <option name="doubles" value="Gold II" >Gold II</option>
                            <option name="doubles" value="Gold III" >Gold III</option>
                            <option name="doubles" value="Platinum I" >Platinum I</option>
                            <option name="doubles" value="Platinum II" >Platinum II</option>
                            <option name="doubles" value="Platinum III" >Platinum III</option>
                            <option name="doubles" value="Diamond I" >Diamond I</option>
                            <option name="doubles" value="Diamond II" >Diamond II</option>
                            <option name="doubles" value="Diamond III" >Diamond III</option>
                            <option name="doubles" value="Champion I" >Champion I</option>
                            <option name="doubles" value="Champion II" >Champion II</option>
                            <option name="doubles" value="Champion III" >Champion III</option>
                            <option name="doubles" value="Grand Champion" >Grand Champion</option>
                        </select></p>
                        <p style="margin-left: 27px;" class="text">Your Rank in 3v3 Standard<select name="standard" class="select1" >
                            <option name="standard" value="0" selected>None</option>
                            <option name="standard" value="Bronze I" >Bronze I</option>
                            <option name="standard" value="Bronze II" >Bronze II</option>
                            <option name="standard" value="Bronze III" >Bronze III</option>
                            <option name="standard" value="Silver I" >Silver I</option>
                            <option name="standard" value="Silver II" >Silver II</option>
                            <option name="standard" value="Silver III" >Silver III</option>
                            <option name="standard" value="Gold I" >Gold I</option>
                            <option name="standard" value="Gold II" >Gold II</option>
                            <option name="standard" value="Gold III" >Gold III</option>
                            <option name="standard" value="Platinum I" >Platinum I</option>
                            <option name="standard" value="Platinum II" >Platinum II</option>
                            <option name="standard" value="Platinum III" >Platinum III</option>
                            <option name="standard" value="Diamond I" >Diamond I</option>
                            <option name="standard" value="Diamond II" >Diamond II</option>
                            <option name="standard" value="Diamond III" >Diamond III</option>
                            <option name="standard" value="Champion I" >Champion I</option>
                            <option name="standard" value="Champion II" >Champion II</option>
                            <option name="standard" value="Champion III" >Champion III</option>
                            <option name="standard" value="Grand Champion" >Grand Champion</option>
                        </select></p>
                    </div>
                    <div class="partFour">
                        <p class="text">Your Rank in 3v3 Solo Standard<select name="solo-standard" class="select1">
                            <option name="solo-standard" value="0" selected>None</option>
                            <option name="solo-standard" value="Bronze I" >Bronze I</option>
                            <option name="solo-standard" value="Bronze II" >Bronze II</option>
                            <option name="solo-standard" value="Bronze III" >Bronze III</option>
                            <option name="solo-standard" value="Silver I" >Silver I</option>
                            <option name="solo-standard" value="Silver II" >Silver II</option>
                            <option name="solo-standard" value="Silver III" >Silver III</option>
                            <option name="solo-standard" value="Gold I" >Gold I</option>
                            <option name="solo-standard" value="Gold II" >Gold II</option>
                            <option name="solo-standard" value="Gold III" >Gold III</option>
                            <option name="solo-standard" value="Platinum I" >Platinum I</option>
                            <option name="solo-standard" value="Platinum II" >Platinum II</option>
                            <option name="solo-standard" value="Platinum III" >Platinum III</option>
                            <option name="solo-standard" value="Diamond I" >Diamond I</option>
                            <option name="solo-standard" value="Diamond II" >Diamond II</option>
                            <option name="solo-standard" value="Diamond III" >Diamond III</option>
                            <option name="solo-standard" value="Champion I" >Champion I</option>
                            <option name="solo-standard" value="Champion II" >Champion II</option>
                            <option name="solo-standard" value="Champion III" >Champion III</option>
                            <option name="solo-standard" value="Grand Champion" >Grand Champion</option>
                        </select></p>
                    </div>
                </div>

                <div class="programmer animated fadeInLeft">
                    <p class="text">Languages you know and examples of projects you've done <textarea style="background:rgba(255,255,255,.1);border:none;" name="programmer" rows="4" cols="45"></textarea></p>
                </div>

                <div class="designer animated fadeInLeft">
                    <p class="text">Examples of projects you've done </br><textarea style="background:rgba(255,255,255,.1);border:none;" name="designer" rows="4" cols="45"></textarea></p>
                </div>

                <div class="editor animated fadeInLeft">
                    <p class="text">Examples of projects you've done </br><textarea style="background:rgba(255,255,255,.1);border:none;" name="editor" rows="4" cols="45"></textarea></p>
                </div>
            </div>
<?php
}else{
    include("404/index.php");
}
?>
