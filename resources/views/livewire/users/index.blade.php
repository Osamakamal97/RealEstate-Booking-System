<div class="row">
    @if (session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success">
            <button class="close" data-close="alert"></button>
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if($show_create)
    @includeIf('livewire.users.create')
    @elseif($show_edit)
    @includeIf('livewire.users.edit')
    @endif

    @if ($showDeleteNotification)
    @includeIf('admin.notifications.sweetalert')
    @endif

    <div class="col-md-12">
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-line-chart"></i>جدول الصلاحيات
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button id="sample_editable_1_new" wire:click.prevent="create()" class="btn green">
                                    إنشاء جديد <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i
                                        class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="dataTables_length" id="sample_1_length">
                            <label>
                                <select wire:model="perPage" class="form-control input-xsmall input-inline">
                                    <option value="5">5</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="">All</option>
                                </select> صفوف</label></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="dataTables_filter"><label>البحث:
                                <input type="search" class="form-control input-small input-inline" placeholder=""
                                    wire:model="search"></label></div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>البريد الالكتروني</th>
                                <th>رقم الهاتف</th>
                                <th>الدولة</th>
                                <th>الحالة</th>
                                <th style="width: 165px">الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="odd gradeX">
                                <td>{{ $user->fullName() }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile_number }}</td>
                                <td>{{ $user->country }}</td>
                                <td>
                                    @if($user->active == 1)
                                    <span class="label label-sm label-success">{{ $user->getActive() }}</span>
                                    @else
                                    <span class="label label-sm label-danger">{{ $user->getActive() }}</span>
                                    @endif
                                </td>
                                <td style="width: 160px">
                                    <button wire:click.prevent="edit({{ $user->id }})" class="btn btn-sm yellow">
                                        تعديل <i class="fa fa-edit"></i>
                                    </button>
                                    <buttin wire:click.prevent="destroy({{ $user->id }})" class="btn btn-sm red">
                                        حذف <i class="fa fa-trash"></i>
                                    </buttin>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite"> يظهر
                            {{$users->firstItem()}} الى {{ $users->lastItem() }} عناصر من أصل
                            {{ $users->total() }}
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="dataTables_paginate paging_bootstrap_full_number">
                            {{ $users->links('livewire.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form Wizard - <span class="step-title">
                        Step 1 of 4 </span>
                </div>
                <div class="tools hidden-xs">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="reload" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="remove" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="#" class="form-horizontal" id="submit_form" method="POST" novalidate="novalidate">
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab" class="step" aria-expanded="true">
                                        <span class="number">
                                            1 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Account Setup </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab" class="step">
                                        <span class="number">
                                            2 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Profile Setup </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab" class="step active">
                                        <span class="number">
                                            3 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Billing Setup </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab4" data-toggle="tab" class="step">
                                        <span class="number">
                                            4 </span>
                                        <span class="desc">
                                            <i class="fa fa-check"></i> Confirm </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success" style="width: 25%;">
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button>
                                    You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-none">
                                    <button class="close" data-dismiss="alert"></button>
                                    Your form validation is successful!
                                </div>
                                <div class="tab-pane active" id="tab1">
                                    <h3 class="block">Provide your account details</h3>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Username <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="username">
                                            <span class="help-block">
                                                Provide your username </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Password <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="password" class="form-control" name="password"
                                                id="submit_form_password">
                                            <span class="help-block">
                                                Provide your password. </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Confirm Password <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="password" class="form-control" name="rpassword">
                                            <span class="help-block">
                                                Confirm your password </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="email">
                                            <span class="help-block">
                                                Provide your email address </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <h3 class="block">Provide your profile details</h3>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fullname <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="fullname">
                                            <span class="help-block">
                                                Provide your fullname </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Phone Number <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="phone">
                                            <span class="help-block">
                                                Provide your phone number </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Gender <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="radio-list">
                                                <label>
                                                    <div class="radio"><span><input type="radio" name="gender" value="M"
                                                                data-title="Male"></span></div>
                                                    Male
                                                </label>
                                                <label>
                                                    <div class="radio"><span><input type="radio" name="gender" value="F"
                                                                data-title="Female"></span></div>
                                                    Female
                                                </label>
                                            </div>
                                            <div id="form_gender_error">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="address">
                                            <span class="help-block">
                                                Provide your street address </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">City/Town <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="city">
                                            <span class="help-block">
                                                Provide your city or town </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Country</label>
                                        <div class="col-md-4">
                                            <div class="select2-container form-control" id="s2id_country_list"><a
                                                    href="javascript:void(0)" class="select2-choice select2-default"
                                                    tabindex="-1"> <span class="select2-chosen"
                                                        id="select2-chosen-1">Select</span><abbr
                                                        class="select2-search-choice-close"></abbr> <span
                                                        class="select2-arrow" role="presentation"><b
                                                            role="presentation"></b></span></a><label
                                                    for="s2id_autogen1" class="select2-offscreen"></label><input
                                                    class="select2-focusser select2-offscreen" type="text"
                                                    aria-haspopup="true" role="button"
                                                    aria-labelledby="select2-chosen-1" id="s2id_autogen1">
                                                <div class="select2-drop select2-display-none select2-with-searchbox">
                                                    <div class="select2-search"> <label for="s2id_autogen1_search"
                                                            class="select2-offscreen"></label> <input type="text"
                                                            autocomplete="off" autocorrect="off" autocapitalize="off"
                                                            spellcheck="false" class="select2-input" role="combobox"
                                                            aria-expanded="true" aria-autocomplete="list"
                                                            aria-owns="select2-results-1" id="s2id_autogen1_search"
                                                            placeholder=""> </div>
                                                    <ul class="select2-results" role="listbox" id="select2-results-1">
                                                    </ul>
                                                </div>
                                            </div><select name="country" id="country_list"
                                                class="form-control select2-offscreen" tabindex="-1" title="">
                                                <option value=""></option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia</option>
                                                <option value="BA">Bosnia and Herzegowina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo, the Democratic Republic of the</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Cote d'Ivoire</option>
                                                <option value="HR">Croatia (Hrvatska)</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard and Mc Donald Islands</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran (Islamic Republic of)</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                <option value="KR">Korea, Republic of</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libyan Arab Jamahiriya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macau</option>
                                                <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="AN">Netherlands Antilles</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Reunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint LUCIA</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SK">Slovakia (Slovak Republic)</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SH">St. Helena</option>
                                                <option value="PM">St. Pierre and Miquelon</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syrian Arab Republic</option>
                                                <option value="TW">Taiwan, Province of China</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UM">United States Minor Outlying Islands</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Viet Nam</option>
                                                <option value="VG">Virgin Islands (British)</option>
                                                <option value="VI">Virgin Islands (U.S.)</option>
                                                <option value="WF">Wallis and Futuna Islands</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Remarks</label>
                                        <div class="col-md-4">
                                            <textarea class="form-control" rows="3" name="remarks"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <h3 class="block">Provide your billing and credit card details</h3>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Card Holder Name <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="card_name">
                                            <span class="help-block">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Card Number <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="card_number">
                                            <span class="help-block">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">CVC <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="" class="form-control" name="card_cvc">
                                            <span class="help-block">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Expiration(MM/YYYY) <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="MM/YYYY" maxlength="7" class="form-control"
                                                name="card_expiry_date">
                                            <span class="help-block">
                                                e.g 11/2020 </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Payment Options <span class="required"
                                                aria-required="true">
                                                * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="checkbox-list">
                                                <label>
                                                    <div class="checker"><span><input type="checkbox" name="payment[]"
                                                                value="1"
                                                                data-title="Auto-Pay with this Credit Card."></span>
                                                    </div> Auto-Pay with this Credit Card
                                                </label>
                                                <label>
                                                    <div class="checker"><span><input type="checkbox" name="payment[]"
                                                                value="2" data-title="Email me monthly billing."></span>
                                                    </div> Email me monthly billing
                                                </label>
                                            </div>
                                            <div id="form_payment_error">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab4">
                                    <h3 class="block">Confirm your account</h3>
                                    <h4 class="form-section">Account</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Username:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="username">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="email">
                                            </p>
                                        </div>
                                    </div>
                                    <h4 class="form-section">Profile</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fullname:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="fullname">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Gender:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="gender">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Phone:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="phone">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="address">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">City/Town:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="city">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Country:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="country">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Remarks:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="remarks">
                                            </p>
                                        </div>
                                    </div>
                                    <h4 class="form-section">Billing</h4>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Card Holder Name:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="card_name">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Card Number:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="card_number">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">CVC:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="card_cvc">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Expiration:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="card_expiry_date">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Payment Options:</label>
                                        <div class="col-md-4">
                                            <p class="form-control-static" data-display="payment[]">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <a href="javascript:;" class="btn default button-previous disabled"
                                        style="display: none;">
                                        <i class="m-icon-swapleft"></i> Back </a>
                                    <a href="javascript:;" class="btn blue button-next">
                                        Continue <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                    <a href="javascript:;" class="btn green button-submit" style="display: none;">
                                        Submit <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>