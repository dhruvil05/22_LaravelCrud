
    @extends('layouts.main')
    @push('title')
    <title>Registration</title>
    @endpush
    @section('main.section')
        <h1 class="text-center my-4">Registration Form</h1>
    <form action="{{ url('/') }}/register" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <x-input type='string' name="name" class="name w-50" label="Enter your name" />
            <span class="text-danger">
                @error("name")
                    {{ $message }}
                @enderror
            </span>
            <x-input type="string" name="email" class="email w-50" label="Enter your email" />
            <span class="text-danger">
                @error("email")
                    {{$message }}
                @enderror
            </span>
            <x-input type="password" name="password" class="password w-50" label="Enter your password" />
            <span class="text-danger">
                @error("password")
                    {{$message }}
                @enderror
            </span>
            <x-input type="password" name="Cpassword" class="cpassword w-50" label="Comfirm Password" />
            <span class="text-danger">
                @error("Cpassword")
                    {{$message }}
                @enderror
            </span>
            <x-input type="date" name="dob" class="dob w-25" label="Enter DOB" />
            
            <br>
            <div class="form-check px-0">
           
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="M" checked>
                    <label class="form-check-label" for="gender1">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="F">
                    <label class="form-check-label" for="gender2">
                        Female
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="O">
                    <label class="form-check-label" for="gender2">
                        Other
                    </label>
                </div>
            </div>

            <div class="form-check my-3 px-0">

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="favsport" id="favsport1" value="cricket">
                    <label class="form-check-label" for="favsport1">cricket</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="favsport" id="favsport2" value="badminton">
                    <label class="form-check-label" for="favsport2">badminton</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="favsport" id="favsport3" value="football">
                    <label class="form-check-label" for="favsport3">football</label>
                  </div>
            </div>
            {{-- @include('components.array') --}}
            @php
                
                
                $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                
                $indianStates = ['AR' => 'Arunachal Pradesh', 'AR' => 'Arunachal Pradesh', 'AS' => 'Assam', 'BR' => 'Bihar', 'CT' => 'Chhattisgarh', 'GA' => 'Goa', 'GJ' => 'Gujarat', 'HR' => 'Haryana', 'HP' => 'Himachal Pradesh', 'JK' => 'Jammu and Kashmir', 'JH' => 'Jharkhand', 'KA' => 'Karnataka', 'KL' => 'Kerala', 'MP' => 'Madhya Pradesh', 'MH' => 'Maharashtra', 'MN' => 'Manipur', 'ML' => 'Meghalaya', 'MZ' => 'Mizoram', 'NL' => 'Nagaland', 'OR' => 'Odisha', 'PB' => 'Punjab', 'RJ' => 'Rajasthan', 'SK' => 'Sikkim', 'TN' => 'Tamil Nadu', 'TG' => 'Telangana', 'TR' => 'Tripura', 'UP' => 'Uttar Pradesh', 'UT' => 'Uttarakhand', 'WB' => 'West Bengal', 'AN' => 'Andaman and Nicobar Islands', 'CH' => 'Chandigarh', 'DN' => 'Dadra and Nagar Haveli', 'DD' => 'Daman and Diu', 'LD' => 'Lakshadweep', 'DL' => 'National Capital Territory of Delhi', 'PY' => 'Puducherry'];
                                    
    
    
                     
            @endphp
            <br>
             <div class="form-check form-check-inline my-3">
                 <label for="country">Select Country</label>
                <select class="select" name="country" class="country " >

                    @foreach ($countries as $key => $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
    
                </select>
            </div>
            <br>
            <div class="form-check form-check-inline my-3">
                <label for="country">Select State</label>
                <select class="select" name="state" class="state" label="Enter your State">

                    @foreach ($indianStates as $key => $state)
                        <option value="{{ $state }}">{{ $state }}</option>
                    @endforeach
    
                </select>
            </div>
            
            <x-input type="text" name="address " class="address w-50" label="Enter address" />
            <x-input type="file" name="file" class="file w-50" label="Enter File" />
            <x-input type="string" name="hobbies" class="hobby w-50" label="Your Hobbies" />
           

           

            {{-- <x-input type="string" name="country" class="country" label="Enter your Country" /> --}}
            <br>
            <button class="btn btn-primary my-3">Submit</button>
            <a href="home" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Cancel</a>

        </div>
    </form>
    @endsection

     @section('main.section')
        
    <form action="{{ url('/') }}/register" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <x-input type='string' name="name" class="name w-50" label="Enter your name" />
            <span class="text-danger">
                @error("name")
                    {{ $message }}
                @enderror
            </span>
            <x-input type="string" name="email" class="email w-50" label="Enter your email" />
            <span class="text-danger">
                @error("email")
                    {{$message }}
                @enderror
            </span>
            <x-input type="password" name="password" class="password w-50" label="Enter your password" />
            <span class="text-danger">
                @error("password")
                    {{$message }}
                @enderror
            </span>
            <x-input type="password" name="Cpassword" class="cpassword w-50" label="Comfirm Password" />
            <span class="text-danger">
                @error("Cpassword")
                    {{$message }}
                @enderror
            </span>
            <x-input type="date" name="dob" class="dob w-25" label="Enter DOB" />
            
            <br>
            <div class="form-check px-0">
           
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="M" checked>
                    <label class="form-check-label" for="gender1">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="F">
                    <label class="form-check-label" for="gender2">
                        Female
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="O">
                    <label class="form-check-label" for="gender2">
                        Other
                    </label>
                </div>
            </div>

            <div class="form-check my-3 px-0">

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="favsport" id="favsport1" value="cricket">
                    <label class="form-check-label" for="favsport1">cricket</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="favsport" id="favsport2" value="badminton">
                    <label class="form-check-label" for="favsport2">badminton</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="favsport" id="favsport3" value="football">
                    <label class="form-check-label" for="favsport3">football</label>
                  </div>
            </div>
            {{-- @include('components.array') --}}
            @php
                
                
                $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                
                $indianStates = ['AR' => 'Arunachal Pradesh', 'AR' => 'Arunachal Pradesh', 'AS' => 'Assam', 'BR' => 'Bihar', 'CT' => 'Chhattisgarh', 'GA' => 'Goa', 'GJ' => 'Gujarat', 'HR' => 'Haryana', 'HP' => 'Himachal Pradesh', 'JK' => 'Jammu and Kashmir', 'JH' => 'Jharkhand', 'KA' => 'Karnataka', 'KL' => 'Kerala', 'MP' => 'Madhya Pradesh', 'MH' => 'Maharashtra', 'MN' => 'Manipur', 'ML' => 'Meghalaya', 'MZ' => 'Mizoram', 'NL' => 'Nagaland', 'OR' => 'Odisha', 'PB' => 'Punjab', 'RJ' => 'Rajasthan', 'SK' => 'Sikkim', 'TN' => 'Tamil Nadu', 'TG' => 'Telangana', 'TR' => 'Tripura', 'UP' => 'Uttar Pradesh', 'UT' => 'Uttarakhand', 'WB' => 'West Bengal', 'AN' => 'Andaman and Nicobar Islands', 'CH' => 'Chandigarh', 'DN' => 'Dadra and Nagar Haveli', 'DD' => 'Daman and Diu', 'LD' => 'Lakshadweep', 'DL' => 'National Capital Territory of Delhi', 'PY' => 'Puducherry'];
                                    
    
    
                     
            @endphp
            <br>
             <div class="form-check form-check-inline my-3">
                 <label for="country">Select Country</label>
                <select class="select" name="country" class="country " >

                    @foreach ($countries as $key => $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
    
                </select>
            </div>
            <br>
            <div class="form-check form-check-inline my-3">
                <label for="country">Select State</label>
                <select class="select" name="state" class="state" label="Enter your State">

                    @foreach ($indianStates as $key => $state)
                        <option value="{{ $state }}">{{ $state }}</option>
                    @endforeach
    
                </select>
            </div>
            
            <x-input type="text" name="address " class="address w-50" label="Enter address" />
            <x-input type="file" name="file" class="file w-50" label="Enter File" />
            <x-input type="string" name="hobbies" class="hobby w-50" label="Your Hobbies" />
           

           

            {{-- <x-input type="string" name="country" class="country" label="Enter your Country" /> --}}
            <br>
            <button class="btn btn-primary my-3">Submit</button>
            <a href="home" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Cancel</a>

        </div>
    </form>
    @endsection