<?php
use App\Http\Controllers\DocumentController as Doc;
use App\User as User;
use App\Section;
use App\Http\Controllers\ReleaseController as Rel;
use App\Tracking_Releasev2;
use App\Http\Controllers\DocumentController as document;


$user = Session::get('auth');
$id = $user->id;
$section = \App\User::where('id', $id)->pluck('section')->first();

foreach($po_no as $po_num)

?>
@include('css.track_css')
@if(count($document))

    <div class="alert alert-warning">
        <div class="text-warning">
            <?php
             if ($section == '78' || $section == '79' || $section == '80' || $section == '81' || $section == '120' )
             {
                echo '<i class="fa fa-warning"></i> Documents that not accepted within 24 hours will be reported';
             }
             else
              {
                echo '<i class="fa fa-warning"></i> Documents that not accepted within 45 minutes will be reported';
                echo '<br><i class="fa fa-warning"></i> If Document is from PDOHO, and DATRC it will be reported within 24 hours';
            }
          ?>

        </div>
        @if($doc_type == 'PR_CATERING' || $doc_type == 'PR_COLAT'  || $doc_type == 'PR_DRUG'  || $doc_type == 'PR_ITSUP'  || $doc_type == 'PR_MEDEQ'  || $doc_type == 'PR_OFFSUP' 
        || $doc_type == 'PR_SECURITY'  || $doc_type == 'PRR_S'  || $doc_type == 'PR_CATERING' || $doc_type == 'PR_VAN')
            <div class="row bs-wizard" style="border-bottom:0;">

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==1) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                    @if($step2 != 0 && $step < 1)
                                        <span class="text-danger">Bypass Chief Administrative Office</span>
                                    @else
                                    Chief Administrative Office
                                    @endif
                            </div>
                                <div class="progress"><div class="progress-bar"></div></div>
                                <a href="javascript:void(0)" class="bs-wizard-dot active" data-toggle="tooltip" data-placement="top" ></a>
                            </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==2) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=2.5)
                                    <span class="text-danger">Bypass Budget Section</span>
                                @else
                                    Budget Section
                                @endif
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==3) complete @break  @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=3.5)
                                    <span class="text-danger">Bypass Accounting Section </span>
                                @else
                                Accounting Section 
                                @endif
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top"></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==4) complete @break  @endif  @endfor"><!-- complete -->
                          <div class="text-center bs-wizard-stepnum">
                                @if($step2>=4.5)
                                    <span class="text-danger">Bypass  Regional Directors Office - RD</span>
                                @else
                                 Regional Directors Office - RD
                                @endif
                        </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==5) complete @break  @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=5.5)
                                    <span class="text-danger">Bypass Supply Unit</span>
                                @else
                                 Supply Unit
                                @endif
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==6) complete @break  @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=5.5)
                                    <span class="text-danger">Bypass Procurement Unit</span>
                                @else
                                 Procurement Unit
                                @endif

                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top"></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==7) complete @break  @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=7.5)
                                    <span class="text-danger">Bypass End Cycle</span>
                                @else
                                 End Cycle
                                @endif
                                
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" ></a>
                        </div>
                    </div>
            </div>
        @endif

        @if($doc_type == 'TRF')
            @if($division == '7')
            <div class="row bs-wizard" style="border-bottom:0;">

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==1) complete @break   @endif @endfor"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                                @if($step2 != 0 && $step < 1)
                                    <span class="text-danger">Bypass Chief Administrative Office</span>
                                @else
                                HRDU
                                @endif
                           
                        </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==1.5) Bypass @else CAO @endif" @if($step==1.5) style="background-color:#a94442;" @endif ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==2) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=2.5)
                                    <span class="text-danger">Bypass HRDU</span>
                                @else
                                Budget 
                                @endif

                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==2.5) Bypass @else Budget @endif" @if($step==2.5) style="background-color:#a94442;" @endif ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==3) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=3.5)
                                    <span class="text-danger">Bypass Accounting Section</span>
                                @else
                                CAO 
                                @endif
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==3.5) Bypass @else Accounting @endif" @if($step==3.5) style="background-color:#a94442;" @endif></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==4) complete @break   @endif @endfor"><!-- complete -->
                          <div class="text-center bs-wizard-stepnum">
                                @if($step2>=4.5)
                                    <span class="text-danger">Bypass  Regional Directors Office - RD</span>
                                @else
                                 Regional Directors Office - RD
                                @endif
                           
                        </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==4.5) Didn't Bypass  Regional Directors Office @else Regional Directors Office @endif" @if($step==4.5) style="background-color:#a94442;" @endif></a>
                        </div>
                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==5) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=5.5)
                                    <span class="text-danger">Bypass Supply Unit</span>
                                @else
                                CAO 
                                @endif

                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==5.5) Didn't Bypass Supply @else Supply @endif" @if($step==5.5) style="background-color:#a94442;" @endif></a>
                        </div>
                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==6) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=6.5)
                                    <span class="text-danger">Bypass Procurement Unit</span>
                                @else
                                End Cycle
                                @endif
                                
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==6.5) Didn't Bypass Procurement @else Procurement @endif" @if($step==6.5) style="background-color:#a94442;" @endif></a>
                        </div>
                    </div>

            </div>
            @elseif($division == '8' || $division == '9')
            <div class="row bs-wizard" style="border-bottom:0;">

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==1) complete @break   @endif @endfor"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                                @if($step2 != 0 && $step < 1)
                                    <span class="text-danger">Bypass Chief Administrative Office</span>
                                @else
                                Chief LHSD/RLED 
                                @endif
                           
                        </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==1.5) Bypass @else CAO @endif" @if($step==1.5) style="background-color:#a94442;" @endif ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==2) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=2.5)
                                    <span class="text-danger">Bypass HRDU</span>
                                @else
                                HRDU  
                                @endif

                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==2.5) Bypass @else Budget @endif" @if($step==2.5) style="background-color:#a94442;" @endif ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==3) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=3.5)
                                    <span class="text-danger">Bypass Accounting Section</span>
                                @else
                                Budget 
                                @endif
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==3.5) Bypass @else Accounting @endif" @if($step==3.5) style="background-color:#a94442;" @endif></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==4) complete @break   @endif @endfor"><!-- complete -->
                          <div class="text-center bs-wizard-stepnum">
                                @if($step2>=4.5)
                                    <span class="text-danger">Bypass  Regional Directors Office - RD</span>
                                @else
                                 CAO
                                @endif
                           
                        </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==4.5) Didn't Bypass  Regional Directors Office @else Regional Directors Office @endif" @if($step==4.5) style="background-color:#a94442;" @endif></a>
                        </div>
                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==5) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=5.5)
                                    <span class="text-danger">Bypass Supply Unit</span>
                                @else
                                Regional Directors Office - RD 
                                @endif

                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==5.5) Didn't Bypass Supply @else Supply @endif" @if($step==5.5) style="background-color:#a94442;" @endif></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==6) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=6.5)
                                    <span class="text-danger">Bypass Procurement Unit</span>
                                @else
                                CAO
                                @endif
                                
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==6.5) Didn't Bypass Procurement @else Procurement @endif" @if($step==6.5) style="background-color:#a94442;" @endif></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==7) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=6.5)
                                    <span class="text-danger">Bypass Procurement Unit</span>
                                @else
                                End Cycle
                                @endif
                                
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==6.5) Didn't Bypass Procurement @else Procurement @endif" @if($step==6.5) style="background-color:#a94442;" @endif></a>
                        </div>
                    </div>

            </div>
            @endif
        @endif

        @if($doc_type == 'RPO')
            <div class="row bs-wizard" style="border-bottom:0;">

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==1) complete @break   @endif @endfor"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                                @if($step2 != 0 && $step < 1)
                                    <span class="text-danger">Bypass Regional Director Office - RD</span>
                                @else
                                    Regional Director Office - RD
                                @endif
                           
                        </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==1.5) Bypass @else RD @endif" @if($step==1.5) style="background-color:#a94442;" @endif ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==2) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=2.5)
                                    <span class="text-danger">Bypass Records Section</span>
                                @else
                                Records Section
                                @endif

                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==2.5) Bypass @else Records @endif" @if($step==2.5) style="background-color:#a94442;" @endif ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==3) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=3.5)
                                    <span class="text-danger">Bypass End Cycle</span>
                                @else
                                 End Cycle
                                @endif
                                
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==3.5) Didn't Bypass End Cycle @else End Cycle @endif" @if($step==7.5) style="background-color:#a94442;" @endif></a>
                        </div>
                    </div>

            </div>
        @endif

        @if($doc_type == 'TEV')
            <div class="row bs-wizard" style="border-bottom:0;">

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==1) complete @break   @endif @endfor"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                                @if($step2 != 0 && $step < 1)
                                    <span class="text-danger">Bypass Chief Administrative Office</span>
                                @else
                                CAO / Chief LHSD/RLED 
                                @endif
                           
                        </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==1.5) Bypass @else CAO @endif" @if($step==1.5) style="background-color:#a94442;" @endif ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==2) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=2.5)
                                    <span class="text-danger">Bypass ARD</span>
                                @else
                                ARD/RDOffice 
                                @endif

                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==2.5) Bypass ARD @else ARD @endif" @if($step==2.5) style="background-color:#a94442;" @endif ></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==3) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=3.5)
                                    <span class="text-danger">Bypass Budget Section</span>
                                @else
                                Budget Section
                                @endif
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==3.5) Bypass Budget @else Budget @endif" @if($step==3.5) style="background-color:#a94442;" @endif></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==4) complete @break   @endif @endfor"><!-- complete -->
                          <div class="text-center bs-wizard-stepnum">
                                @if($step2>=4.5)
                                    <span class="text-danger">Bypass  Accounting Section</span>
                                @else
                                 Accounting Section
                                @endif
                           
                        </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==4.5) Didn't Bypass Accounting @else Accounting @endif" @if($step==4.5) style="background-color:#a94442;" @endif></a>
                        </div>

                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==5) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=5.5)
                                    <span class="text-danger">BypassRD/ARD - Office</span>
                                @else
                                RD/ARD - Office
                                @endif

                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==5.5) Didn't BypassRD/ARD - Office @elseRD/ARD - Office @endif" @if($step==5.5) style="background-color:#a94442;" @endif></a>
                        </div>
                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==6) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=6.5)
                                    <span class="text-danger">Bypass Cashier Section</span>
                                @else
                                 Cashier Section
                                @endif
                                
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==6.5) Didn't Bypass Cashier Section @else Cashier Section @endif" @if($step==6.5) style="background-color:#a94442;" @endif></a>
                        </div>
                        <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==7) complete @break   @endif @endfor"><!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                @if($step2>=7.5)
                                    <span class="text-danger">Bypass End Cycle</span>
                                @else
                                 End Cycle
                                @endif
                                
                            </div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==7.5) Didn't Bypass End Cycle @else End Cycle @endif" @if($step==7.5) style="background-color:#a94442;" @endif></a>
                        </div>
                    </div>

            </div>
        @endif

        @if($doc_type == 'COM_LETTER')
            @if($division == '7')
            <div class="row bs-wizard" style="border-bottom:0;">

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==1) complete @break   @endif @endfor"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">
                        @if($step2 != 0 && $step < 1)
                            <span class="text-danger">Bypass Chief Administrative Office</span>
                        @else
                        Chief Administrative Office
                        @endif
                
                </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==1.5) Bypass CAO @else CAO @endif" @if($step==1.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==2) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=2.5)
                            <span class="text-danger">Bypass RD/ARD - Office</span>
                        @else
                        RD/ARD - Office
                        @endif

                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==2.5) Bypass RD/ARD @else RD/ARD @endif" @if($step==2.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==3) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=3.5)
                            <span class="text-danger">Bypass Records Section</span>
                        @else
                        Records Section
                        @endif

                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==3.5) Bypass RD/ARD @else RD/ARD @endif" @if($step==3.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==4) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=3.5)
                            <span class="text-danger">Bypass End Cycle</span>
                        @else
                        End Cycle
                        @endif
                        
                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==4.5) Didn't Bypass End Cycle @else End Cycle @endif" @if($step==7.5) style="background-color:#a94442;" @endif></a>
                </div>
                </div>

            </div>
            @elseif($division == '8' || $division == '9')
            <div class="row bs-wizard" style="border-bottom:0;">

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==1) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                            @if($step2 != 0 && $step < 1)
                                <span class="text-danger">Bypass Chief LHSD Office</span>
                            @else
                            Chief LHSD Office
                            @endif
                    
                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==1.5) Bypass CAO @else CAO @endif" @if($step==1.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==2) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=2.5)
                            <span class="text-danger">Bypass Chief Administrative Office - Office</span>
                        @else
                        Chief Administrative Office - Office
                        @endif

                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==2.5) Bypass CAO @else CAO @endif" @if($step==2.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==3) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=3.5)
                            <span class="text-danger">Bypass RD/ARD - Office</span>
                        @else
                        RD/ARD - Office
                        @endif

                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==3.5) Bypass RD/ARD @else RD/ARD @endif" @if($step==3.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==4) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=4.5)
                            <span class="text-danger">Bypass Records Section</span>
                        @else
                        Records Section
                        @endif

                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==4.5) Bypass RD/ARD @else RD/ARD @endif" @if($step==4.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==5) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=5.5)
                            <span class="text-danger">Bypass End Cycle</span>
                        @else
                        End Cycle
                        @endif
                        
                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==5.5) Didn't Bypass End Cycle @else End Cycle @endif" @if($step==7.5) style="background-color:#a94442;" @endif></a>
                </div>
                </div>

            </div>
            @endif
        @endif

        @if($doc_type == 'VEHICLE')
            @if($division == '7')
            <div class="row bs-wizard" style="border-bottom:0;">

            <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==1) complete @break   @endif @endfor"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">
                        @if($step2 != 0 && $step < 1)
                            <span class="text-danger">Bypass Chief Administrative Office</span>
                        @else
                        Chief Administrative Office
                        @endif
                
                </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==1.5) Bypass CAO @else CAO @endif" @if($step==1.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==2) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=2.5)
                            <span class="text-danger">Bypass General Services</span>
                        @else
                        General Services
                        @endif

                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==2.5) Bypass GSS @else GSS @endif" @if($step==2.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==3) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=3.5)
                            <span class="text-danger">Bypass End Cycle</span>
                        @else
                        End Cycle
                        @endif
                        
                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==3.5) Didn't Bypass End Cycle @else End Cycle @endif" @if($step==7.5) style="background-color:#a94442;" @endif></a>
                </div>
                </div>

            </div>
            @elseif($division == '8' || $division == '9')
            <div class="row bs-wizard" style="border-bottom:0;">

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==1) complete @break   @endif @endfor"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">
                        @if($step2 != 0 && $step < 1)
                            <span class="text-danger">Bypass Chief LHSD/RLED</span>
                        @else
                        Chief LHSD/RLED
                        @endif
                
                </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==1.5) Bypass Chief LHSD/RLED @else Chief LHSD/RLED @endif" @if($step==1.5) style="background-color:#a94442;" @endif ></a>
                </div>


                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==2) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=2.5)
                            <span class="text-danger">Bypass Chief Administrative Office</span>
                        @else
                        Chief Administrative Office
                        @endif

                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==2.5) Bypass CAO @else CAO @endif" @if($step==2.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==3) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=2.5)
                            <span class="text-danger">Bypass General Services</span>
                        @else
                        General Services
                        @endif

                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==2.5) Bypass GSS @else GSS @endif" @if($step==2.5) style="background-color:#a94442;" @endif ></a>
                </div>

                <div class="col-xs-2 bs-wizard-step @for($i=0;$i<count($steps);$i++) @if($steps[$i]==4) complete @break   @endif @endfor"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">
                        @if($step2>=3.5)
                            <span class="text-danger">Bypass End Cycle</span>
                        @else
                        End Cycle
                        @endif
                        
                    </div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="javascript:void(0)" class="bs-wizard-dot" data-toggle="tooltip" data-placement="top" title="@if($step==3.5) Didn't Bypass End Cycle @else End Cycle @endif" @if($step==7.5) style="background-color:#a94442;" @endif></a>
                </div>
                </div>

            </div>
            @endif
        @endif
    </div>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th width="14.2%">Received By</th>
            <th width="13.2%">Date In</th>
            <th width="14.2%">Subject</th>
            <th width="14.2%">For Released To</th>
            <th width="13.2%">Released by Date/Time</th>
            <th width="14.2%">Duration</th>
            <th width="16.2%">Released Remarks</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $data = array();
        ?>
        @foreach($document as $doc)
            <?php
           $rled = "9";
           $pdoho = "10";
           $datrc = "12";
            if($doc->received_by!=0){
                $data['id'][] = $doc->id;
                if($user = User::find($doc->received_by)){
                    $sectionid = $user->section;
                    $data['received_by'][] = $user->fname.' '.$user->lname;
                    $data['section'][] = (Section::find($user->section)) ? Section::find($user->section)->description:'';
                    $division_from = (Section::find($user->section)) ? Section::find($user->section)->division:'';
                } else {
                    $data['received_by'][] = "No Name".' '.$doc->received_by;
                    $data['section'][] = "No Section";
                }
                $data['date'][] = $doc->date_in;
                $data['date_in'][] = date('M d, Y', strtotime($doc->date_in));
                $data['time_in'][] = date('h:i A', strtotime($doc->date_in));
                $data['remarks'][] = $doc->action;
                $data['status'][] = $doc->status;
                $released = Tracking_Releasev2::where("document_id","=",$doc->id)->first();
                if($released){
                    $released_div_to = (Section::find($released->released_section_to)) ? Section::find($released->released_section_to)->division:'';
                    if($released_section_to = Section::find($released->released_section_to)){
                        $data['released_section_to'][] = $released_section_to->description;
                    } else {
                        $data['released_section_to'][] = "No Data";
                    }
                    $data['released_date_time'][] = $released->released_date;
                    $data['released_duration_status'][] = $released->rel_status;
                    $data['released_date'][] = date('M d, Y', strtotime($released->released_date));
                    $data['released_time'][] = date('h:i A', strtotime($released->released_date));
                    $data['released_remarks'][] = $released->remarks;
                    if($released->status == 'report' || $released->status == "waiting"  && document::checkMinutes($released->released_date) > 960
                     && ($released_div_to == $rled  || $released_div_to == $pdoho  || $released_div_to == $datrc) ){
                        $data['released_status'][] = "<small class='text-danger'><i class='fa fa-thumbs-down'></i> (Reported)</small>";
                        $data['released_alert'][] = "alert alert-danger";
                    }
                    elseif($released->status == 'report' || $released->status == "waiting"  && document::checkMinutes($released->released_date) > 960
                    && ($division_from == $rled || $division_from == $pdoho  || $division_from == $datrc) ) {
                        $data['released_status'][] = "<small class='text-danger'><i class='fa fa-thumbs-down'></i> (Reported)</small>";
                        $data['released_alert'][] = "alert alert-danger";  
                    }
                     elseif($released->status == 'report' || $released->status == "waiting"  && document::checkMinutes($released->released_date) > 45
                     && $released_div_to != $pdoho && $released_div_to != $rled && $released_div_to != $datrc
                     && $division_from != $pdoho && $division_from != $rled && $division_from != $datrc){
                        $data['released_status'][] = "<small class='text-danger'><i class='fa fa-thumbs-down'></i> (Reported)</small>";
                        $data['released_alert'][] = "alert alert-danger";
  
                    }elseif($released->status == 'accept') {
                        $data['released_status'][] = "<small style='color: #228e2f'><i class='fa fa-thumbs-up'></i> (Accepted)</small>";
                        $data['released_alert'][]  = "alert alert-success";
 
                    }
                    elseif($released->status == 'return') {
                        $data['released_status'][] = "<small style='color:#7626a6'><i class='fa fa-reply-all'></i> (Returned)</small>";
                        $data['released_alert'][]  = "";
                     
                    }
                    else {
                        $data['released_status'][] = "<small class='text-warning'><i class='fa fa-refresh'></i> (Waiting to accept)</small>";
                        $data['released_alert'][]  = "";  
                    
                    }
                } else {
                    $data['released_alert'][]  = "";
                    $data['released_section_to'][] = "";
                    $data['released_date_time'][] = "";
                    $data['released_date'][] = "";
                    $data['released_time'][] = "";
                    $data['released_remarks'][] = "";
                    $data['released_status'][] = "";
                    $data['released_duration_status'][] = "";
                }
            }
            ?>
        @endforeach
        @for($i=0;$i<count($data['received_by']);$i++)
            <?php
            $received_success = 'text-success';
            $released_info = 'text-info';
            if($data['section'][$i]=='Unconfirmed' || $data['section'][$i]=='Returned')
            {
                $class = 'text-danger text-strong';
            }
            ?>
            <tr>
                <td class="text-bold trackFontSize {{ $received_success }}">{{ $data['received_by'][$i] }}
                    <br>
                    <small class="text-warning">({{ $data['section'][$i] }})</small>
                </td>
                <td class="trackFontSize {{ $received_success }}">
                    {{ $data['date_in'][$i] }}
                    <br>
                    {{ $data['time_in'][$i] }}
                </td>
                
                <td class="trackFontSize {{ $received_success }}">{!! nl2br($data['remarks'][$i]) !!}</td>
                <td class="trackFontSize text-bold {{ $released_info }}">
                    {{ $data['released_section_to'][$i] }}
                    <br>
                    {!! $data['released_status'][$i] !!}
                </td>
                <td class="trackFontSize {{ $released_info }}">
                    {{ $data['released_date'][$i] }}
                    <br>
                    {{ $data['released_time'][$i] }}
                    <br>
                    {{ $data['released_duration_status'][$i] }}
                </td>
                <td class="trackFontSize {{ $received_success }}">
                    <?php
                    $date = date('Y-m-d H:i:s');
                    if($i == 0){
                        if(empty($data['released_date_time'][$i])){
                            if(isset($data['date'][$i+1])){
                                $start_date = $data['date'][$i];
                                $end_date = $data['date'][$i+1];
                            }
                            else{
                                $start_date = $data['date'][$i];
                                $end_date = $date;
                            }
                        }
                        else {
                            $start_date = $data['date'][$i];
                            $end_date = $data['released_date_time'][$i];
                        }
                    }
                    else{
                        if(empty($data['released_date_time'][$i-1])){
                            if(isset($data['date'][$i+1])){
                                if(empty($data['released_date_time'][$i])){
                                    $start_date = $data['date'][$i];
                                    $end_date = $data['date'][$i+1];
                                }
                                else {
                                    $start_date = $data['date'][$i];
                                    $end_date = $data['released_date_time'][$i];
                                }
                            }
                            else {
                                if(empty($data['released_date_time'][$i])){
                                    $start_date = $data['date'][$i];
                                    $end_date = $date;
                                }
                                else {
                                    $start_date = $data['date'][$i];
                                    $end_date = $data['released_date_time'][$i];
                                }
                            }
                        } else {
                            if(isset($data['date'][$i+1])){
                                if(empty($data['released_date_time'][$i])){
                                    $start_date = $data['released_date_time'][$i-1];
                                    $end_date = $data['date'][$i+1];
                                } else {
                                    $start_date = $data['released_date_time'][$i-1];
                                    $end_date = $data['released_date_time'][$i];
                                }
                            }
                            else{
                                if(empty($data['released_date_time'][$i])){
                                    $start_date = $data['released_date_time'][$i-1];
                                    $end_date = $date;
                                }
                                else {
                                    $start_date = $data['released_date_time'][$i-1];
                                    $end_date = $data['released_date_time'][$i];
                                }
                            }
                        }
                    }
                    ?>
                    @if($data['status'][$i]==1 && $i == count($data['received_by'])-1)
                        Cycle End
                    @else
                        {{ Rel::duration($start_date,$end_date) }}
                    @endif
                </td>
                <td class="trackFontSize {{ $released_info }}">{!! nl2br($data['released_remarks'][$i]) !!}</td>
            </tr>
        @endfor
        </tbody>
    </table>
@else
    <div class="alert alert-danger">
        <i class="fa fa-times"></i> No tracking history!
    </div>
@endif
<div class="modal-footer">

    @if($doc_type == "PR_DRUG" || $doc_type == "PR_CATERING" || $doc_type == "PR_VAN" || $doc_type == "PR_MEDSUP" || $doc_type == "PR_MEDEQ" || $doc_type == "PR_ITSUP" 
    || $doc_type == "PR_OFFSUP" || $doc_type == "PR_VEHREQM" || $doc_type == "PR_SECURITY" || $doc_type == "PRC" || $doc_type == "PRR_S" || $doc_type == "PRR_M")
            @if(count($pr_no) > 0)
            <button type="button" class="btn btn-info print_pr" onclick="window.open('{{ asset('prapi/print/'.$barcode) }}')" ><i class="fa fa-check"></i> PR</button>
             @else
             <button type="button" class="btn btn-info" disabled><i class="fa fa-check" ></i> PR</button>
             @endif
             @if(count($po_no) > 0)
            <button type="button" class="btn btn-info" onclick="window.open('{{ asset('poapi/print/'.$po_num) }}')"><i class="fa fa-check"></i> PO</button>
            @else
            <button type="button" class="btn btn-info" disabled><i class="fa fa-check" ></i> PO</button>
            @endif
    @endif

            <button type="button" class="btn btn-default cancel_track" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            <button type="button" class="btn btn-success" onclick="window.open('{{ asset('pdf/track') }}')"><i class="fa fa-print"></i> Print</button>
</div>
