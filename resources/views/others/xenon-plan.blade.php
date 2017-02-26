@extends('layouts.main')

@section('title')
    Boxsteps
@stop

@section('custom-css')
@stop

@section('breadcrumbs')
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Nueva planificación</h1>
            <p class="description">Crea una nueva planificación a través del formato presentado</p>
        </div>

        <div class="breadcrumb-env">
            <ol class="breadcrumb bc-1">
                <li>
                    <a href="{{ url('/dashboard') }}"><i class="fa-home"></i>Inicio</a>
                </li>
                <li>
                    <a href="#">Planificaciones</a>
                </li>
                <li class="active">
                    <strong>Nueva planificación</strong>
                </li>
            </ol>
        </div>

    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">

            <div class="panel panel-default">

                <div class="panel-heading">
				    <h3 class="panel-title">Planificación inicial</h3>
				</div>

                <div class="panel-body">

                    <form role="form">

                        <div class="form-group">
                            <label class="control-label">Área de conocimiento</label>

                            <script type="text/javascript">
                                jQuery(document).ready(function($)
                                {
                                    $("#s2example-1").select2({
                                        placeholder: 'Seleccione',
                                        allowClear: true
                                    }).on('select2-open', function()
                                    {
                                        // Adding Custom Scrollbar
                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                    });

                                });
                            </script>

                            <select class="form-control" id="s2example-1">
                                <option></option>
                                <optgroup label="North America">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>Arizona</option>
                                    <option>Arkansas</option>
                                    <option>California</option>
                                    <option>Colorado</option>
                                    <option>Connecticut</option>
                                    <option>Delaware</option>
                                    <option>Florida</option>
                                    <option>Georgia</option>
                                    <option>Hawaii</option>
                                    <option>Idaho</option>
                                    <option>Illinois</option>
                                    <option>Indiana</option>
                                    <option>Iowa</option>
                                    <option>Kansas</option>
                                    <option>Kentucky[C]</option>
                                    <option>Louisiana</option>
                                    <option>Maine</option>
                                    <option>Maryland</option>
                                    <option>Massachusetts[D]</option>
                                    <option>Michigan</option>
                                    <option>Minnesota</option>
                                    <option>Mississippi</option>
                                    <option>Missouri</option>
                                    <option>Montana</option>
                                    <option>Nebraska</option>
                                    <option>Nevada</option>
                                    <option>New Hampshire</option>
                                    <option>New Jersey</option>
                                    <option>New Mexico</option>
                                    <option>New York</option>
                                    <option>North Carolina</option>
                                    <option>North Dakota</option>
                                    <option>Ohio</option>
                                    <option>Oklahoma</option>
                                    <option>Oregon</option>
                                    <option>Pennsylvania[E]</option>
                                    <option>Rhode Island[F]</option>
                                    <option>South Carolina</option>
                                    <option>South Dakota</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Utah</option>
                                    <option>Vermont</option>
                                    <option>Virginia[G]</option>
                                    <option>Washington</option>
                                    <option>West Virginia</option>
                                    <option>Wisconsin</option>
                                    <option>Wyoming</option>
                                </optgroup>
                                <optgroup label="Europe">
                                    <option>Albania</option>
                                    <option>Andorra</option>
                                    <option>Armenia</option>
                                    <option>Austria</option>
                                    <option>Azerbaijan</option>
                                    <option>Belarus</option>
                                    <option>Belgium</option>
                                    <option>Bosnia & Herzegovina</option>
                                    <option>Bulgaria</option>
                                    <option>Croatia</option>
                                    <option>Cyprus</option>
                                    <option>Czech Republic</option>
                                    <option>Denmark</option>
                                    <option>Estonia</option>
                                    <option>Finland</option>
                                    <option>France</option>
                                    <option>Georgia</option>
                                    <option>Germany</option>
                                    <option>Greece</option>
                                    <option>Hungary</option>
                                    <option>Iceland</option>
                                    <option>Ireland</option>
                                    <option>Italy</option>
                                    <option>Kosovo</option>
                                    <option>Latvia</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania</option>
                                    <option>Luxembourg</option>
                                    <option>Macedonia</option>
                                    <option>Malta</option>
                                    <option>Moldova</option>
                                    <option>Monaco</option>
                                    <option>Montenegro</option>
                                    <option>The Netherlands</option>
                                    <option>Norway</option>
                                    <option>Poland</option>
                                    <option>Portugal</option>
                                    <option>Romania</option>
                                    <option>Russia</option>
                                    <option>San Marino</option>
                                    <option>Serbia</option>
                                    <option>Slovakia</option>
                                    <option>Slovenia</option>
                                    <option>Spain</option>
                                    <option>Sweden</option>
                                    <option>Switzerland</option>
                                    <option>Turkey</option>
                                    <option>Ukraine</option>
                                    <option>United Kingdom</option>
                                    <option>Vatican City (Holy See)</option>
                                </optgroup>
                                <optgroup label="Asia">
                                    <option>Afghanistan</option>
                                    <option>Bahrain</option>
                                    <option>Bangladesh</option>
                                    <option>Bhutan</option>
                                    <option>Brunei</option>
                                    <option>Cambodia</option>
                                    <option>China</option>
                                    <option>East Timor</option>
                                    <option>India</option>
                                    <option>Indonesia</option>
                                    <option>Iran</option>
                                    <option>Iraq</option>
                                    <option>Israel</option>
                                    <option>Japan</option>
                                    <option>Jordan</option>
                                    <option>Kazakhstan</option>
                                    <option>Korea North</option>
                                    <option>Korea South</option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan</option>
                                    <option>Laos</option>
                                    <option>Lebanon</option>
                                    <option>Malaysia</option>
                                    <option>Maldives</option>
                                    <option>Mongolia</option>
                                    <option>Myanmar (Burma)</option>
                                    <option>Nepal</option>
                                    <option>Oman</option>
                                    <option>Pakistan</option>
                                    <option>The Philippines</option>
                                    <option>Qatar</option>
                                    <option>Russia</option>
                                    <option>Saudi Arabia</option>
                                    <option>Singapore</option>
                                    <option>Sri Lanka</option>
                                    <option>Syria</option>
                                    <option>Taiwan</option>
                                    <option>Tajikistan</option>
                                    <option>Thailand</option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan</option>
                                    <option>United Arab Emirates</option>
                                    <option>Uzbekistan</option>
                                    <option>Vietnam</option>
                                    <option>Yemen</option>
                                </optgroup>
                            </select>

                        </div>

                        <div class="form-group">
                            <label class="control-label">Bloque conceptual</label>

                            <script type="text/javascript">
                                jQuery(document).ready(function($)
                                {
                                    $("#s2example-2").select2({
                                        placeholder: 'Seleccione',
                                        allowClear: true
                                    }).on('select2-open', function()
                                    {
                                        // Adding Custom Scrollbar
                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                    });

                                });
                            </script>

                            <select class="form-control" id="s2example-2">
                                <option></option>
                                <optgroup label="North America">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>Arizona</option>
                                    <option>Arkansas</option>
                                    <option>California</option>
                                    <option>Colorado</option>
                                    <option>Connecticut</option>
                                    <option>Delaware</option>
                                    <option>Florida</option>
                                    <option>Georgia</option>
                                    <option>Hawaii</option>
                                    <option>Idaho</option>
                                    <option>Illinois</option>
                                    <option>Indiana</option>
                                    <option>Iowa</option>
                                    <option>Kansas</option>
                                    <option>Kentucky[C]</option>
                                    <option>Louisiana</option>
                                    <option>Maine</option>
                                    <option>Maryland</option>
                                    <option>Massachusetts[D]</option>
                                    <option>Michigan</option>
                                    <option>Minnesota</option>
                                    <option>Mississippi</option>
                                    <option>Missouri</option>
                                    <option>Montana</option>
                                    <option>Nebraska</option>
                                    <option>Nevada</option>
                                    <option>New Hampshire</option>
                                    <option>New Jersey</option>
                                    <option>New Mexico</option>
                                    <option>New York</option>
                                    <option>North Carolina</option>
                                    <option>North Dakota</option>
                                    <option>Ohio</option>
                                    <option>Oklahoma</option>
                                    <option>Oregon</option>
                                    <option>Pennsylvania[E]</option>
                                    <option>Rhode Island[F]</option>
                                    <option>South Carolina</option>
                                    <option>South Dakota</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Utah</option>
                                    <option>Vermont</option>
                                    <option>Virginia[G]</option>
                                    <option>Washington</option>
                                    <option>West Virginia</option>
                                    <option>Wisconsin</option>
                                    <option>Wyoming</option>
                                </optgroup>
                                <optgroup label="Europe">
                                    <option>Albania</option>
                                    <option>Andorra</option>
                                    <option>Armenia</option>
                                    <option>Austria</option>
                                    <option>Azerbaijan</option>
                                    <option>Belarus</option>
                                    <option>Belgium</option>
                                    <option>Bosnia & Herzegovina</option>
                                    <option>Bulgaria</option>
                                    <option>Croatia</option>
                                    <option>Cyprus</option>
                                    <option>Czech Republic</option>
                                    <option>Denmark</option>
                                    <option>Estonia</option>
                                    <option>Finland</option>
                                    <option>France</option>
                                    <option>Georgia</option>
                                    <option>Germany</option>
                                    <option>Greece</option>
                                    <option>Hungary</option>
                                    <option>Iceland</option>
                                    <option>Ireland</option>
                                    <option>Italy</option>
                                    <option>Kosovo</option>
                                    <option>Latvia</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania</option>
                                    <option>Luxembourg</option>
                                    <option>Macedonia</option>
                                    <option>Malta</option>
                                    <option>Moldova</option>
                                    <option>Monaco</option>
                                    <option>Montenegro</option>
                                    <option>The Netherlands</option>
                                    <option>Norway</option>
                                    <option>Poland</option>
                                    <option>Portugal</option>
                                    <option>Romania</option>
                                    <option>Russia</option>
                                    <option>San Marino</option>
                                    <option>Serbia</option>
                                    <option>Slovakia</option>
                                    <option>Slovenia</option>
                                    <option>Spain</option>
                                    <option>Sweden</option>
                                    <option>Switzerland</option>
                                    <option>Turkey</option>
                                    <option>Ukraine</option>
                                    <option>United Kingdom</option>
                                    <option>Vatican City (Holy See)</option>
                                </optgroup>
                                <optgroup label="Asia">
                                    <option>Afghanistan</option>
                                    <option>Bahrain</option>
                                    <option>Bangladesh</option>
                                    <option>Bhutan</option>
                                    <option>Brunei</option>
                                    <option>Cambodia</option>
                                    <option>China</option>
                                    <option>East Timor</option>
                                    <option>India</option>
                                    <option>Indonesia</option>
                                    <option>Iran</option>
                                    <option>Iraq</option>
                                    <option>Israel</option>
                                    <option>Japan</option>
                                    <option>Jordan</option>
                                    <option>Kazakhstan</option>
                                    <option>Korea North</option>
                                    <option>Korea South</option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan</option>
                                    <option>Laos</option>
                                    <option>Lebanon</option>
                                    <option>Malaysia</option>
                                    <option>Maldives</option>
                                    <option>Mongolia</option>
                                    <option>Myanmar (Burma)</option>
                                    <option>Nepal</option>
                                    <option>Oman</option>
                                    <option>Pakistan</option>
                                    <option>The Philippines</option>
                                    <option>Qatar</option>
                                    <option>Russia</option>
                                    <option>Saudi Arabia</option>
                                    <option>Singapore</option>
                                    <option>Sri Lanka</option>
                                    <option>Syria</option>
                                    <option>Taiwan</option>
                                    <option>Tajikistan</option>
                                    <option>Thailand</option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan</option>
                                    <option>United Arab Emirates</option>
                                    <option>Uzbekistan</option>
                                    <option>Vietnam</option>
                                    <option>Yemen</option>
                                </optgroup>
                            </select>

                        </div>

                    </form>

                </div>
            </div>

            <div class="panel panel-default">

                <div class="panel-heading">
				    <h3 class="panel-title">Definición de fecha</h3>
				</div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Fecha de planificación</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker">

                                    <div class="input-group-addon">
                                        <a href="#"><i class="linecons-calendar"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Hora de inicio</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control timepicker">

                                    <div class="input-group-addon">
                                        <i class="linecons-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Hora de fin</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control timepicker">

                                    <div class="input-group-addon">
                                        <i class="linecons-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
@stop

@section('custom-js-footer')
    <script type="text/javascript">
        $(document).ready(function(){
            $.fn.datepicker.defaults.language = 'es';
            $('.datepicker').datepicker({
                format: 'D, dd MM yyyy',
                weekStart: 1,
                daysOfWeekDisabled: [0,6],
                startDate: '0d',
                autoclose: true
            });
        });
    </script>

    <link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/multiselect/css/multi-select.css">

    <script src="assets/js/daterangepicker/daterangepicker.js"></script>
    <script src="assets/js/datepicker/bootstrap-datepicker.js"></script>
    <script src="assets/js/datepicker/bootstrap-datepicker.es.js"></script>
    <script src="assets/js/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="assets/js/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
    <script src="assets/js/tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/typeahead.bundle.js"></script>
    <script src="assets/js/handlebars.min.js"></script>
    <script src="assets/js/multiselect/js/jquery.multi-select.js"></script>
@stop
