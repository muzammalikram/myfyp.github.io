<template>
    <div >

        <div class="container">

            <!-- Timeline
            ================================================= -->
            <div class="timeline">
                



                <profileHeader></profileHeader> 





                <div id="page-contents">
                    <div class="row">
                        <div class="col-md-3">

                            <!--Edit Profile Menu-->
                            <ul class="edit-menu">

                                <li :class="isActive_basic"><i class="icon ion-ios-information-outline"></i><a v-on:click="show_basic()">Basic Information</a></li>
                                <li :class="isActive_edu"><i class="icon ion-ios-briefcase-outline"></i><a v-on:click="show_edu()" >Education and Work</a></li>
                                <li :class="isActive_interest"><i class="icon ion-ios-heart-outline"></i><a v-on:click="show_interest()" >My Interests</a></li>
                                <li :class="isActive_account"><i class="icon ion-ios-settings"></i><a v-on:click="show_account()" >Account Settings</a></li>
                                <li :class="isActive_pass"><i class="icon ion-ios-locked-outline"></i><a v-on:click="change_pass()">Change Password</a></li>

                            </ul>
                        </div>
                        <div class="col-md-7">

                            <!-- Basic Information
                            ================================================= -->
                            <div class="edit-profile-container" v-if="!basic">
                                <div class="block-title">
                                    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit basic information</h4>
                                    <div class="line"></div>
                                </div>
                                <div class="edit-block">
                                    <form name="basic-info" id="basic-info" class="form-inline">
                                        <div class="row">
 
                                            <div class="form-group col-xs-6">
                                                <label for="firstname">First name</label>

                                               <!-- <i class="fas fa-lock" v-if="disabled == 1" @click="disabled = (disabled + 1) % 2"></i>-->

                                                <input id="firstname"  class="form-control input-group-lg" type="text"
                                                        v-model="Basic_info.f_name" name="firstname" title="Enter first name" placeholder="First name"  value="" />
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label for="lastname" class="">Last name</label>
                                                <input id="lastname" class="form-control input-group-lg" type="text"
                                                       name="lastname" title="Enter last name" v-model="Basic_info.l_name" placeholder="Last name" value="Doe" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="email">My email</label>
                                                <input id="email" class="form-control input-group-lg" type="text" v-model="Basic_info.email" name="Email" title="Enter Email" placeholder="My Email" value="razor.venon@gmail.com" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p class="custom-label"><strong>Date of Birth</strong></p>
                                            <div class="form-group col-sm-3 col-xs-6">
                                                <label for="month" class="sr-only"></label>

                                                <select class="form-control" v-model="Basic_info.date" id="date">
                                                    <option value="Day" disabled selected>Day</option>
                                                    <option v-for="day in 31" :value="day">{{ day }}</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-sm-3 col-xs-6">
                                                <label for="month" class="sr-only"></label>
                                                <select class="form-control" v-model="Basic_info.month" id="month">
                                                    <option value="month">Month</option>
                                                    <option>Jan</option>
                                                    <option>Feb</option>
                                                    <option>Mar</option>
                                                    <option>Apr</option>
                                                    <option>May</option>
                                                    <option>Jun</option>
                                                    <option>Jul</option>
                                                    <option>Aug</option>
                                                    <option>Sep</option>
                                                    <option>Oct</option>
                                                    <option>Nov</option>
                                                    <option selected>Dec</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label for="year" class="sr-only"></label>
                                                <select class="form-control" v-model="Basic_info.year" id="year">
                                                    <option value="year" disabled selected>Year</option>
                                                    <option v-for="year in getCurrentYear" :value="year">{{ year }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group gender">
                                            <span class="custom-label"><strong>I am a: </strong></span>
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio" v-model="Basic_info.gender" value="M">Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio" v-model="Basic_info.gender" value="F">Female
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-6">
                                                <label for="city"> My city</label>
                                                <input id="city" class="form-control input-group-lg" v-model="Basic_info.city" type="text" name="city" title="Enter city" placeholder="Your city" value="New York"/>
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label for="country">My country</label>
                                                <select class="form-control" v-model="Basic_info.country" id="country">
                                                    <option value="country">Country</option>
                                                    <option value="AFG">Afghanistan</option>
                                                    <option value="ALA">Ƭand Islands</option>
                                                    <option value="ALB">Albania</option>
                                                    <option value="DZA">Algeria</option>
                                                    <option value="ASM">American Samoa</option>
                                                    <option value="AND">Andorra</option>
                                                    <option value="AGO">Angola</option>
                                                    <option value="AIA">Anguilla</option>
                                                    <option value="ATA">Antarctica</option>
                                                    <option value="ATG">Antigua and Barbuda</option>
                                                    <option value="ARG">Argentina</option>
                                                    <option value="ARM">Armenia</option>
                                                    <option value="ABW">Aruba</option>
                                                    <option value="AUS">Australia</option>
                                                    <option value="AUT">Austria</option>
                                                    <option value="AZE">Azerbaijan</option>
                                                    <option value="BHS">Bahamas</option>
                                                    <option value="BHR">Bahrain</option>
                                                    <option value="BGD">Bangladesh</option>
                                                    <option value="BRB">Barbados</option>
                                                    <option value="BLR">Belarus</option>
                                                    <option value="BEL">Belgium</option>
                                                    <option value="BLZ">Belize</option>
                                                    <option value="BEN">Benin</option>
                                                    <option value="BMU">Bermuda</option>
                                                    <option value="BTN">Bhutan</option>
                                                    <option value="BOL">Bolivia, Plurinational State of</option>
                                                    <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BIH">Bosnia and Herzegovina</option>
                                                    <option value="BWA">Botswana</option>
                                                    <option value="BVT">Bouvet Island</option>
                                                    <option value="BRA">Brazil</option>
                                                    <option value="IOT">British Indian Ocean Territory</option>
                                                    <option value="BRN">Brunei Darussalam</option>
                                                    <option value="BGR">Bulgaria</option>
                                                    <option value="BFA">Burkina Faso</option>
                                                    <option value="BDI">Burundi</option>
                                                    <option value="KHM">Cambodia</option>
                                                    <option value="CMR">Cameroon</option>
                                                    <option value="CAN">Canada</option>
                                                    <option value="CPV">Cape Verde</option>
                                                    <option value="CYM">Cayman Islands</option>
                                                    <option value="CAF">Central African Republic</option>
                                                    <option value="TCD">Chad</option>
                                                    <option value="CHL">Chile</option>
                                                    <option value="CHN">China</option>
                                                    <option value="CXR">Christmas Island</option>
                                                    <option value="CCK">Cocos (Keeling) Islands</option>
                                                    <option value="COL">Colombia</option>
                                                    <option value="COM">Comoros</option>
                                                    <option value="COG">Congo</option>
                                                    <option value="COD">Congo, the Democratic Republic of the</option>
                                                    <option value="COK">Cook Islands</option>
                                                    <option value="CRI">Costa Rica</option>
                                                    <option value="CIV">C𴥠d'Ivoire</option>
                                                    <option value="HRV">Croatia</option>
                                                    <option value="CUB">Cuba</option>
                                                    <option value="CUW">Cura袯</option>
                                                    <option value="CYP">Cyprus</option>
                                                    <option value="CZE">Czech Republic</option>
                                                    <option value="DNK">Denmark</option>
                                                    <option value="DJI">Djibouti</option>
                                                    <option value="DMA">Dominica</option>
                                                    <option value="DOM">Dominican Republic</option>
                                                    <option value="ECU">Ecuador</option>
                                                    <option value="EGY">Egypt</option>
                                                    <option value="SLV">El Salvador</option>
                                                    <option value="GNQ">Equatorial Guinea</option>
                                                    <option value="ERI">Eritrea</option>
                                                    <option value="EST">Estonia</option>
                                                    <option value="ETH">Ethiopia</option>
                                                    <option value="FLK">Falkland Islands (Malvinas)</option>
                                                    <option value="FRO">Faroe Islands</option>
                                                    <option value="FJI">Fiji</option>
                                                    <option value="FIN">Finland</option>
                                                    <option value="FRA">France</option>
                                                    <option value="GUF">French Guiana</option>
                                                    <option value="PYF">French Polynesia</option>
                                                    <option value="ATF">French Southern Territories</option>
                                                    <option value="GAB">Gabon</option>
                                                    <option value="GMB">Gambia</option>
                                                    <option value="GEO">Georgia</option>
                                                    <option value="DEU">Germany</option>
                                                    <option value="GHA">Ghana</option>
                                                    <option value="GIB">Gibraltar</option>
                                                    <option value="GRC">Greece</option>
                                                    <option value="GRL">Greenland</option>
                                                    <option value="GRD">Grenada</option>
                                                    <option value="GLP">Guadeloupe</option>
                                                    <option value="GUM">Guam</option>
                                                    <option value="GTM">Guatemala</option>
                                                    <option value="GGY">Guernsey</option>
                                                    <option value="GIN">Guinea</option>
                                                    <option value="GNB">Guinea-Bissau</option>
                                                    <option value="GUY">Guyana</option>
                                                    <option value="HTI">Haiti</option>
                                                    <option value="HMD">Heard Island and McDonald Islands</option>
                                                    <option value="VAT">Holy See (Vatican City State)</option>
                                                    <option value="HND">Honduras</option>
                                                    <option value="HKG">Hong Kong</option>
                                                    <option value="HUN">Hungary</option>
                                                    <option value="ISL">Iceland</option>
                                                    <option value="IND">India</option>
                                                    <option value="IDN">Indonesia</option>
                                                    <option value="IRN">Iran, Islamic Republic of</option>
                                                    <option value="IRQ">Iraq</option>
                                                    <option value="IRL">Ireland</option>
                                                    <option value="IMN">Isle of Man</option>
                                                    <option value="ISR">Israel</option>
                                                    <option value="ITA">Italy</option>
                                                    <option value="JAM">Jamaica</option>
                                                    <option value="JPN">Japan</option>
                                                    <option value="JEY">Jersey</option>
                                                    <option value="JOR">Jordan</option>
                                                    <option value="KAZ">Kazakhstan</option>
                                                    <option value="KEN">Kenya</option>
                                                    <option value="KIR">Kiribati</option>
                                                    <option value="PRK">Korea, Democratic People's Republic of</option>
                                                    <option value="KOR">Korea, Republic of</option>
                                                    <option value="KWT">Kuwait</option>
                                                    <option value="KGZ">Kyrgyzstan</option>
                                                    <option value="LAO">Lao People's Democratic Republic</option>
                                                    <option value="LVA">Latvia</option>
                                                    <option value="LBN">Lebanon</option>
                                                    <option value="LSO">Lesotho</option>
                                                    <option value="LBR">Liberia</option>
                                                    <option value="LBY">Libya</option>
                                                    <option value="LIE">Liechtenstein</option>
                                                    <option value="LTU">Lithuania</option>
                                                    <option value="LUX">Luxembourg</option>
                                                    <option value="MAC">Macao</option>
                                                    <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                                                    <option value="MDG">Madagascar</option>
                                                    <option value="MWI">Malawi</option>
                                                    <option value="MYS">Malaysia</option>
                                                    <option value="MDV">Maldives</option>
                                                    <option value="MLI">Mali</option>
                                                    <option value="MLT">Malta</option>
                                                    <option value="MHL">Marshall Islands</option>
                                                    <option value="MTQ">Martinique</option>
                                                    <option value="MRT">Mauritania</option>
                                                    <option value="MUS">Mauritius</option>
                                                    <option value="MYT">Mayotte</option>
                                                    <option value="MEX">Mexico</option>
                                                    <option value="FSM">Micronesia, Federated States of</option>
                                                    <option value="MDA">Moldova, Republic of</option>
                                                    <option value="MCO">Monaco</option>
                                                    <option value="MNG">Mongolia</option>
                                                    <option value="MNE">Montenegro</option>
                                                    <option value="MSR">Montserrat</option>
                                                    <option value="MAR">Morocco</option>
                                                    <option value="MOZ">Mozambique</option>
                                                    <option value="MMR">Myanmar</option>
                                                    <option value="NAM">Namibia</option>
                                                    <option value="NRU">Nauru</option>
                                                    <option value="NPL">Nepal</option>
                                                    <option value="NLD">Netherlands</option>
                                                    <option value="NCL">New Caledonia</option>
                                                    <option value="NZL">New Zealand</option>
                                                    <option value="NIC">Nicaragua</option>
                                                    <option value="NER">Niger</option>
                                                    <option value="NGA">Nigeria</option>
                                                    <option value="NIU">Niue</option>
                                                    <option value="NFK">Norfolk Island</option>
                                                    <option value="MNP">Northern Mariana Islands</option>
                                                    <option value="NOR">Norway</option>
                                                    <option value="OMN">Oman</option>
                                                    <option value="PAK">Pakistan</option>
                                                    <option value="PLW">Palau</option>
                                                    <option value="PSE">Palestinian Territory, Occupied</option>
                                                    <option value="PAN">Panama</option>
                                                    <option value="PNG">Papua New Guinea</option>
                                                    <option value="PRY">Paraguay</option>
                                                    <option value="PER">Peru</option>
                                                    <option value="PHL">Philippines</option>
                                                    <option value="PCN">Pitcairn</option>
                                                    <option value="POL">Poland</option>
                                                    <option value="PRT">Portugal</option>
                                                    <option value="PRI">Puerto Rico</option>
                                                    <option value="QAT">Qatar</option>
                                                    <option value="REU">R궮ion</option>
                                                    <option value="ROU">Romania</option>
                                                    <option value="RUS">Russian Federation</option>
                                                    <option value="RWA">Rwanda</option>
                                                    <option value="BLM">Saint Barthꭥmy</option>
                                                    <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                                    <option value="KNA">Saint Kitts and Nevis</option>
                                                    <option value="LCA">Saint Lucia</option>
                                                    <option value="MAF">Saint Martin (French part)</option>
                                                    <option value="SPM">Saint Pierre and Miquelon</option>
                                                    <option value="VCT">Saint Vincent and the Grenadines</option>
                                                    <option value="WSM">Samoa</option>
                                                    <option value="SMR">San Marino</option>
                                                    <option value="STP">Sao Tome and Principe</option>
                                                    <option value="SAU">Saudi Arabia</option>
                                                    <option value="SEN">Senegal</option>
                                                    <option value="SRB">Serbia</option>
                                                    <option value="SYC">Seychelles</option>
                                                    <option value="SLE">Sierra Leone</option>
                                                    <option value="SGP">Singapore</option>
                                                    <option value="SXM">Sint Maarten (Dutch part)</option>
                                                    <option value="SVK">Slovakia</option>
                                                    <option value="SVN">Slovenia</option>
                                                    <option value="SLB">Solomon Islands</option>
                                                    <option value="SOM">Somalia</option>
                                                    <option value="ZAF">South Africa</option>
                                                    <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                                    <option value="SSD">South Sudan</option>
                                                    <option value="ESP">Spain</option>
                                                    <option value="LKA">Sri Lanka</option>
                                                    <option value="SDN">Sudan</option>
                                                    <option value="SUR">Suriname</option>
                                                    <option value="SJM">Svalbard and Jan Mayen</option>
                                                    <option value="SWZ">Swaziland</option>
                                                    <option value="SWE">Sweden</option>
                                                    <option value="CHE">Switzerland</option>
                                                    <option value="SYR">Syrian Arab Republic</option>
                                                    <option value="TWN">Taiwan, Province of China</option>
                                                    <option value="TJK">Tajikistan</option>
                                                    <option value="TZA">Tanzania, United Republic of</option>
                                                    <option value="THA">Thailand</option>
                                                    <option value="TLS">Timor-Leste</option>
                                                    <option value="TGO">Togo</option>
                                                    <option value="TKL">Tokelau</option>
                                                    <option value="TON">Tonga</option>
                                                    <option value="TTO">Trinidad and Tobago</option>
                                                    <option value="TUN">Tunisia</option>
                                                    <option value="TUR">Turkey</option>
                                                    <option value="TKM">Turkmenistan</option>
                                                    <option value="TCA">Turks and Caicos Islands</option>
                                                    <option value="TUV">Tuvalu</option>
                                                    <option value="UGA">Uganda</option>
                                                    <option value="UKR">Ukraine</option>
                                                    <option value="ARE">United Arab Emirates</option>
                                                    <option value="GBR">United Kingdom</option>
                                                    <option value="USA" selected>United States</option>
                                                    <option value="UMI">United States Minor Outlying Islands</option>
                                                    <option value="URY">Uruguay</option>
                                                    <option value="UZB">Uzbekistan</option>
                                                    <option value="VUT">Vanuatu</option>
                                                    <option value="VEN">Venezuela, Bolivarian Republic of</option>
                                                    <option value="VNM">Viet Nam</option>
                                                    <option value="VGB">Virgin Islands, British</option>
                                                    <option value="VIR">Virgin Islands, U.S.</option>
                                                    <option value="WLF">Wallis and Futuna</option>
                                                    <option value="ESH">Western Sahara</option>
                                                    <option value="YEM">Yemen</option>
                                                    <option value="ZMB">Zambia</option>
                                                    <option value="ZWE">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="my-info">About me</label>
                                                <textarea id="my-info" name="information" v-model="Basic_info.description" class="form-control" placeholder="Some texts about me" rows="4" cols="400">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur</textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" @click.prevent="basic_information()">Save Changes</button>
                                    </form>
                                </div>
                            </div>


                            <div class="edit-profile-container" v-if="!edu">
                                <div class="block-title">
                                    <h4 class="grey"><i class="icon ion-ios-book-outline"></i>My education</h4>
                                    <div class="line"></div>

                                </div>
                                <div class="edit-block">
                                    <form name="education" id="education" class="form-inline">
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="school">My university</label>
                                                <input id="school" class="form-control input-group-lg" type="text" v-model="edu_info.university" name="school" title="Enter School" placeholder="My School" value="Harvard Unversity" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-6">
                                                <label for="date-from">From</label>
                                                <input id="date-from" class="form-control input-group-lg" type="text" v-model="edu_info.edu_from" name="date" title="Enter a Date" placeholder="from" value="2012" />
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label for="date-to" class="">To</label>
                                                <input id="date-to" class="form-control input-group-lg" type="text" name="date" v-model="edu_info.edu_to" title="Enter a Date" placeholder="to" value="2016" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="edu-description">Description</label>
                                                <textarea id="edu-description" name="description" class="form-control" v-model="edu_info.edu_description" placeholder="Some texts about my education" rows="4" cols="400">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="graduate">Graduated?:-</label>
                                                <input id="graduate" type="checkbox" name="graduate" value="Y" v-model="edu_info.graduate" checked> Yes!!
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" @click.prevent="edu_information()">Save Changes</button>
                                    </form>
                                </div>
                                <div class="block-title">
                                    <h4 class="grey"><i class="icon ion-ios-briefcase-outline"></i>Work Experiences</h4>
                                    <div class="line"></div>

                                </div>
                                <div class="edit-block">
                                    <form name="work" id="work" class="form-inline">
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="company">Company</label>
                                                <input id="company" class="form-control input-group-lg" v-model="work_info.work_company" type="text" name="company" title="Enter Company" placeholder="Company name" value="Envato Inc" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="designation">Designation</label>
                                                <input id="designation" class="form-control input-group-lg" type="text" v-model="work_info.work_designation" name="designation" title="Enter designation" placeholder="designation name" value="Exclusive Author" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-6">
                                                <label for="from-date">From</label>
                                                <input id="from-date" class="form-control input-group-lg" type="text" v-model="work_info.work_from" name="date" title="Enter a Date" placeholder="from" value="2016" />
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label for="to-date" class="">To</label>
                                                <input id="to-date" class="form-control input-group-lg" type="text" name="date" v-model="work_info.work_to" title="Enter a Date" placeholder="to" value="Present" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="work-city">City/Town</label>
                                                <input id="work-city" class="form-control input-group-lg" type="text" name="city" v-model="work_info.work_city" title="Enter city" placeholder="Your city" value="Melbourne"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="work-description">Description</label>
                                                <textarea id="work-description" name="description" class="form-control" v-model="work_info.work_description" placeholder="Some texts about my work" rows="4" cols="400">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" @click.prevent="work_information()">Save Changes</button>
                                    </form>
                                </div>
                            </div>



                            <div class="edit-profile-container" v-if="!interest">
                                <div class="block-title">
                                    <h4 class="grey"><i class="icon ion-ios-heart-outline"></i>My Interests</h4>
                                    <div class="line"></div>

                                </div>
                                <div class="edit-block">
                                    <ul class="list-inline interests">
                                        <li v-for="interest in getInterest">
                                            <span  >{{ interest.interest }}</span>
                                            <i class="fa fa-close" style="cursor: pointer;" @click.prevent="interestDelete(interest.id)"></i>
                                        </li>

                                    </ul>
                                    <div class="line"></div>
                                    <div class="row">
                                        <form>
                                            <p class="custom-label"><strong>Add interests</strong></p>
                                            <div class="form-group col-sm-8">
                                                <input id="add-interest" class="form-control input-group-lg" v-model="interest_info.user_interest" type="text" name="interest" title="Choose Interest" placeholder="Interests. For example, photography"/>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <button class="btn btn-primary" @click.prevent="addInterest()">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="edit-profile-container" v-if="!settings">
                                <div class="block-title">
                                    <h4 class="grey"><i class="icon ion-ios-settings"></i>Account Settings</h4>
                                    <div class="line"></div>

                                </div>
                                <div class="edit-block">
                                    <div class="settings-block">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="switch-description">
                                                    <div><strong>Enable follow me</strong></div>
                                                    <p>Enable this if you want people to follow you</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="toggle-switch">
                                                    <label class="switch">
                                                        <input type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="settings-block">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="switch-description">
                                                    <div><strong>Send me notifications</strong></div>
                                                    <p>Send me notification emails my friends like, share or message me</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="toggle-switch">
                                                    <label class="switch">
                                                        <input type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="settings-block">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="switch-description">
                                                    <div><strong>Text messages</strong></div>
                                                    <p>Send me messages to my cell phone</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="toggle-switch">
                                                    <label class="switch">
                                                        <input type="checkbox">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="settings-block">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="switch-description">
                                                    <div><strong>Enable tagging</strong></div>
                                                    <p>Enable my friends to tag me on their posts</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="toggle-switch">
                                                    <label class="switch">
                                                        <input type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="settings-block">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="switch-description">
                                                    <div><strong>Enable sound</strong></div>
                                                    <p>You'll hear notification sound when someone sends you a private message</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="toggle-switch">
                                                    <label class="switch">
                                                        <input type="checkbox" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="edit-profile-container" v-if="!pass_div">
                                <div class="block-title">
                                    <h4 class="grey"><i class="icon ion-ios-locked-outline"></i>Change Password</h4>
                                    <div class="line"></div>

                                </div>
                                <div class="edit-block">
                                    <form name="update-pass" id="education" class="form-inline">
                                        <div class="row">
                                            <div class="form-group col-xs-12">
                                                <label for="my-password">Old password</label>
                                                <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Old password" v-model="update_pass.old_pass" v-bind:style= "[Color == '0' ? { 'border':'1px solid red'} : {'border' : 'none'}]"  />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-6">
                                                <label>New password</label>
                                                <input class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="New password" v-model="update_pass.new_pass" v-bind:style= "[Color == '1' ? { 'border':'1px solid red'} : {'border' : 'none'}]" />
                                                <!--  v-bind:style="{ 'border':'1px solid '+Color } -->
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label>Confirm password</label>
                                                <input class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Confirm password"  v-model="update_pass.confirm_pass"
                                                 v-bind:style= "[Color == '1' ? { 'border':'1px solid red'} : {'border' : 'none'}]"
                                                 />
                                            </div>
                                        </div>
                                        
                                        <button class="btn btn-primary" @click.prevent="update_pass_fn()">Update Password</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-2 static">

                            <!--Sticky Timeline Activity Sidebar-->
                            <div id="sticky-sidebar">
                                <h4 class="grey">Sarah's activity</h4>
                                <div class="feed-item">
                                    <div class="live-activity">
                                        <p><a href="#" class="profile-link">Sarah</a> Commended on a Photo</p>
                                        <p class="text-muted">5 mins ago</p>
                                    </div>
                                </div>
                                <div class="feed-item">
                                    <div class="live-activity">
                                        <p><a href="#" class="profile-link">Sarah</a> Has posted a photo</p>
                                        <p class="text-muted">an hour ago</p>
                                    </div>
                                </div>
                                <div class="feed-item">
                                    <div class="live-activity">
                                        <p><a href="#" class="profile-link">Sarah</a> Liked her friend's post</p>
                                        <p class="text-muted">4 hours ago</p>
                                    </div>
                                </div>
                                <div class="feed-item">
                                    <div class="live-activity">
                                        <p><a href="#" class="profile-link">Sarah</a> has shared an album</p>
                                        <p class="text-muted">a day ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    import profileHeader from './ProfileHeader.vue'
    import axios from 'axios'

    export default {
        mounted() {
            console.log('Component mounted.');
            //this.get_basic_information();
          //  this.get_edu_information();
          //this.get_auth();
            this.get_interest();
          
            
        },
        data (){
            return {
                Basic_info : {

                    f_name: '',
                    l_name:'',
                    email:'',
                    date : '1',
                    month : 'Jan',
                    year : '2000',
                    gender : '',
                    city : '',
                    country : '',
                    description : ''

                },
                edu_info : {
                    university : '',
                    edu_from :'',
                    edu_to : '',
                    edu_description : '',
                    graduate : ''
                },
                work_info: {
                    work_company: '',
                    work_designation: '',
                    work_from: '',
                    work_to : '',
                    work_city : '',
                    work_description:''
                },
                interest_info : {
                    user_interest : ''
                },
                basic: false,
                edu: true,
                interest: true,
                settings: true,
                pass_div: true,
                isActive_basic : 'active',
                isActive_edu: '',
                isActive_interest: '',
                isActive_account:'',
                isActive_pass:'',

                disabled: 1,

                ABC : '',
                auth : {},
                Color : '',
                getInterest : {},
                
                update_pass : {
                    old_pass : '',
                    new_pass : '',
                    confirm_pass : ''
                }

            }
        },
        computed : {
            getCurrentYear () {
                const year = new Date().getFullYear();
                return Array.from({length: year - 1990}, (value, index) => 1991 + index);
            }
        },
        methods : {

           
                addInterest() {

                var _this = this;
              //   let user = localStorage.getItem("user");

                if (_this.interest_info.user_interest != '') {
                    axios.post('/interest', _this.interest_info)
                        .then(function (response) {

                            _this.interest_info.user_interest = '';


                            if (response.data.error == 500)
                            {
                                _this.$toast.error({
                                    title:'Error',
                                    message:'You can not Add more than 5 interests'
                                })
                            }
                            else
                            {
                                _this.getInterest = response.data.interests;
                                _this.$toast.success({
                                    title:'Interest',
                                    message:'Interest Add Successfully'
                                })
                            }

                            console.log(response.data);

                        })
                        .catch(function (error) {

                            console.log(error);
                            _this.$toast.error({
                                title:'Error',
                                message:'Something Goes wrong'
                            })

                        });
                }

            },
            get_interest(){
                    let _this = this;

                axios.get('/get_interest', _this.interest_info)
                    .then(function (response) {
                        _this.getInterest = response.data.interests;


                        console.log(response.data);

                    })
                    .catch(function (error) {

                        console.log(error);


                    });
            },
            interestDelete(id)
            {
                let _this = this;
                alert(id);
                axios.post('interestDelete/'+id)
                    .then(function (response) {
                        _this.getInterest = response.data.interests;

                        console.log(response.data);

                    })
                    .catch(function (error) {

                        console.log(error);


                    });
            },
            ActiveClass() {
                    var _this = this;
                    _this.ABC = "active";
            },
            basic_information() {

                var _this = this;
               /* let user = localStorage.getItem("user");*/
                    

                axios.post('/Basic_info' ,  _this.Basic_info)
                    .then(function (response) {

                         _this.Basic_info = response.data;
                        //console.log(response.data);

                    })
                    .catch(function (error) {

                        console.log(error);
                         _this.$toast.error({
                                title:'Error',
                                message:'Please Fill the information correctly'
                            })

                    });

            },
            get_auth() {
                let _this = this;
                axios.get('/get_auth')
                    .then(function (response) {
                        _this.auth = response.data;
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            get_basic_information() {

                    let _this = this;
                 axios.get('/get_basic')
                    .then(function (response) {
                        _this.Basic_info = response.data;
                       // console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            get_edu_information() {
                let _this = this;
                 axios.get('/get_edu')
                    .then(function (response) {
                         //_this.edu_information = response.data;
                       //  _this.edu_information.edu_to = response.data.edu_to;
                         console.log(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            edu_information () {
                var _this = this;
                /*let data = {};
                data.edu_info = _this.edu_info;
                data.user_id = localStorage.getItem('user').id;*/

                //let user = localStorage.getItem("user");
                
                axios.post('/Edu_info/', _this.edu_info )
                    .then(function (response) {

                        console.log(response.data);
                        let res = response.data; 
                        if (res == 1) {
                            _this.$toast.success({
                                title:'Updated',
                                message:'Educational Info Updated'
                            })
                        }else if (res == 0) {
                        
                            _this.$toast.success({
                                title:'Added',
                                message:'Educational Info Added'
                            })
                        }

                    })
                    .catch(function (error) {

                        console.log(error);
                        _this.$toast.error({
                                title:'Error',
                                message:'Something Goes Wrong'
                            })

                    });

            },
            work_information() {

                var _this = this;
                // let user = localStorage.getItem("user");

                axios.post('/work_info/',  _this.work_info )
                    .then(function (response) {

                        console.log(response.data);
                         let res = response.data; 
                        if (res == 1) {
                            _this.$toast.success({
                                title:'Updated',
                                message:'Work Information Updated'
                            })
                        }else if (res == 0) {
                        
                            _this.$toast.success({
                                title:'Added',
                                message:'Work Information Added'
                            })
                        }

                    })
                    .catch(function (error) {

                        console.log(error);
                         _this.$toast.error({
                                title:'Error',
                                message:'Something Goes Wrong'
                            })

                    });

            },
            show_basic() {
                var _this = this;

                _this.basic = false;
                _this.edu = true;
                _this.interest = true;
                _this.settings = true;
                _this.pass_div = true;


                _this.isActive_basic = "active";

                _this.isActive_edu= '';
                _this.isActive_interest='';
                _this.isActive_account='';
                _this.isActive_pass='';


            },
            show_edu() {
                var _this = this;

                _this.basic = true;
                _this.edu = false;
                _this.interest = true;
                _this.settings = true;
                _this.pass_div = true;

                _this.isActive_basic='';

                _this.isActive_edu = "active";



                _this.isActive_interest='';
                _this.isActive_account='';
                _this.isActive_pass='';


            },
            show_interest() {
                var _this = this;

                _this.basic = true;
                _this.edu = true;
                _this.interest = false;
                _this.settings = true;
                _this.pass_div = true;


                _this.isActive_interest = "active";
                _this.isActive_basic='';
                _this.isActive_edu= '';

                _this.isActive_account='';
                _this.isActive_pass='';

            },
            show_account() {
                var _this = this;

                _this.basic = true;
                _this.edu = true;
                _this.interest = true;
                _this.settings = false;
                _this.pass_div = true;


                _this.isActive_account = "active";
                _this.isActive_basic='';
                _this.isActive_edu= '';
                _this.isActive_interest='';

                _this.isActive_pass='';
            },
            change_pass() {
                var _this = this;

                _this.basic = true;
                _this.edu = true;
                _this.interest = true;
                _this.settings = true;
                _this.pass_div = false;


                _this.isActive_pass = "active";

                _this.isActive_basic='';
                _this.isActive_edu= '';
                _this.isActive_interest='';
                _this.isActive_account='';

             },

             update_pass_fn() {
                
                let _this = this;

                    axios.post('/changePassword',  _this.update_pass )
                    .then(function (response) {
                        
                        

                        let res = response.data.result;
                        console.log(res);
                        if (res == 1) {
                            
                            _this.Color = '1';
                        }
                        if (res == 2) {
                            _this.Color = '';
                            _this.update_pass.new_pass  = '';
                            _this.update_pass.old_pass  = '';
                            _this.update_pass.confirm_pass  = '';

                                _this.$toast.success({
                                title:'Congratulate!',
                                message:'Password Update Successfully'
                            })
                        }
                        if (res == 0) {
                            _this.Color = '';
                            _this.Color = '0';
                        }

                    //    console.log(response.data);
                        //  let res = response.data; 
                        // if (res == 1) {
                        //     _this.$toast.success({
                        //         title:'Updated',
                        //         message:'Work Information Updated'
                        //     })
                        // }else if (res == 0) {
                        
                        //     _this.$toast.success({
                        //         title:'Added',
                        //         message:'Work Information Added'
                        //     })
                        // }

                    })
                    .catch(function (error) {

                        // console.log(error);
                        //  _this.$toast.error({
                        //         title:'Error',
                        //         message:'Something Goes Wrong'
                        //     })

                    });


             }
        },
        components : {
            profileHeader
        }
    }
</script>
