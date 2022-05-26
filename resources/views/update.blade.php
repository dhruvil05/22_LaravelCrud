@extends('layouts.main')
@push('title')
    <title>Update Student</title>
@endpush
@section('main.section')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card my-3">
                    <div class="card-header">
                        <h1 class="text-center">Student update Form</h1>
                    </div>
                    <div class="card-body">
                        <div class="back">
                            <a href="{{ url('students') }}" class="btn btn-danger active float-right" role="button"
                                aria-pressed="true">Back</a>
                        </div>
                        <form action="{{ url('update-student/' . $student->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="container">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="string" class="form-control name" name="name" aria-describedby="nameHelp"
                                        value="{{ $student->name }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="string" class="form-control email" name="email"
                                        aria-describedby="emailHelp" value="{{ $student->email }}">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control dob" name="dob" aria-describedby="dobHelp"
                                        value="{{ $student->dob }}">
                                    <span class="text-danger">
                                        @error('dob')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-check px-0">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender1"
                                            @if ($student->gender == 'M') checked @endif value="M">
                                        <label class="form-check-label" for="gender1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender2"
                                            @if ($student->gender == 'F') checked @endif value="F">
                                        <label class="form-check-label" for="gender2">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender3"
                                            @if ($student->gender == 'O') checked @endif value="O">
                                        <label class="form-check-label" for="gender3">
                                            Other
                                        </label>
                                    </div>
                                </div>

                                <div class="form-check my-3 px-0">

                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="favsport" id="favsport1"
                                            @if ($student->fav_sport == 'cricket') checked @endif value="cricket">
                                        <label class="form-check-label" for="favsport1">cricket</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="favsport" id="favsport2"
                                            @if ($student->fav_sport == 'badminton') checked @endif value="badminton">
                                        <label class="form-check-label" for="favsport2">badminton</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="favsport" id="favsport3"
                                            @if ($student->fav_sport == 'football') checked @endif value="football">
                                        <label class="form-check-label" for="favsport3">football</label>
                                    </div>
                                </div>
                                {{-- @include('components.array') --}}
                                @php
                                    
                                    $countries = [
                                        'Afghanistan',
                                        'Albania',
                                        'Algeria',
                                        'American Samoa',
                                        'Andorra',
                                        'Angola',
                                        'Anguilla',
                                        'Antarctica',
                                        'Antigua and Barbuda',
                                        'Argentina',
                                        'Armenia',
                                        'Aruba',
                                        'Australia',
                                        'Austria',
                                        'Azerbaijan',
                                        'Bahamas',
                                        'Bahrain',
                                        'Bangladesh',
                                        'Barbados',
                                        'Belarus',
                                        'Belgium',
                                        'Belize',
                                        'Benin',
                                        'Bermuda',
                                        'Bhutan',
                                        'Bolivia',
                                        'Bosnia and Herzegowina',
                                        'Botswana',
                                        'Bouvet Island',
                                        'Brazil',
                                        'British Indian Ocean Territory',
                                        'Brunei Darussalam',
                                        'Bulgaria',
                                        'Burkina Faso',
                                        'Burundi',
                                        'Cambodia',
                                        'Cameroon',
                                        'Canada',
                                        'Cape Verde',
                                        'Cayman Islands',
                                        'Central African Republic',
                                        'Chad',
                                        'Chile',
                                        'China',
                                        'Christmas Island',
                                        'Cocos (Keeling) Islands',
                                        'Colombia',
                                        'Comoros',
                                        'Congo',
                                        'Congo, the Democratic Republic of the',
                                        'Cook Islands',
                                        'Costa Rica',
                                        'Cote d`Ivoire',
                                        'Croatia (Hrvatska)',
                                        'Cuba',
                                        'Cyprus',
                                        'Czech Republic',
                                        'Denmark',
                                        'Djibouti',
                                        'Dominica',
                                        'Dominican Republic',
                                        'East Timor',
                                        'Ecuador',
                                        'Egypt',
                                        'El Salvador',
                                        'Equatorial Guinea',
                                        'Eritrea',
                                        'Estonia',
                                        'Ethiopia',
                                        'Falkland Islands (Malvinas)',
                                        'Faroe Islands',
                                        'Fiji',
                                        'Finland',
                                        'France',
                                        'France Metropolitan',
                                        'French Guiana',
                                        'French Polynesia',
                                        'French Southern Territories',
                                        'Gabon',
                                        'Gambia',
                                        'Georgia',
                                        'Germany',
                                        'Ghana',
                                        'Gibraltar',
                                        'Greece',
                                        'Greenland',
                                        'Grenada',
                                        'Guadeloupe',
                                        'Guam',
                                        'Guatemala',
                                        'Guinea',
                                        'Guinea-Bissau',
                                        'Guyana',
                                        'Haiti',
                                        'Heard and Mc Donald Islands',
                                        'Holy See (Vatican City State)',
                                        'Honduras',
                                        'Hong Kong',
                                        'Hungary',
                                        'Iceland',
                                        'India',
                                        'Indonesia',
                                        'Iran (Islamic Republic of)',
                                        'Iraq',
                                        'Ireland',
                                        'Israel',
                                        'Italy',
                                        'Jamaica',
                                        'Japan',
                                        'Jordan',
                                        'Kazakhstan',
                                        'Kenya',
                                        'Kiribati',
                                        'Korea, Democratic People`s Republic of',
                                        'Korea, Republic of',
                                        'Kuwait',
                                        'Kyrgyzstan',
                                        'Lao, People`s Democratic Republic',
                                        'Latvia',
                                        'Lebanon',
                                        'Lesotho',
                                        'Liberia',
                                        'Libyan Arab Jamahiriya',
                                        'Liechtenstein',
                                        'Lithuania',
                                        'Luxembourg',
                                        'Macau',
                                        'Macedonia, The Former Yugoslav Republic of',
                                        'Madagascar',
                                        'Malawi',
                                        'Malaysia',
                                        'Maldives',
                                        'Mali',
                                        'Malta',
                                        'Marshall Islands',
                                        'Martinique',
                                        'Mauritania',
                                        'Mauritius',
                                        'Mayotte',
                                        'Mexico',
                                        'Micronesia, Federated States of',
                                        'Moldova, Republic of',
                                        'Monaco',
                                        'Mongolia',
                                        'Montserrat',
                                        'Morocco',
                                        'Mozambique',
                                        'Myanmar',
                                        'Namibia',
                                        'Nauru',
                                        'Nepal',
                                        'Netherlands',
                                        'Netherlands Antilles',
                                        'New Caledonia',
                                        'New Zealand',
                                        'Nicaragua',
                                        'Niger',
                                        'Nigeria',
                                        'Niue',
                                        'Norfolk Island',
                                        'Northern Mariana Islands',
                                        'Norway',
                                        'Oman',
                                        'Pakistan',
                                        'Palau',
                                        'Panama',
                                        'Papua New Guinea',
                                        'Paraguay',
                                        'Peru',
                                        'Philippines',
                                        'Pitcairn',
                                        'Poland',
                                        'Portugal',
                                        'Puerto Rico',
                                        'Qatar',
                                        'Reunion',
                                        'Romania',
                                        'Russian Federation',
                                        'Rwanda',
                                        'Saint Kitts and Nevis',
                                        'Saint Lucia',
                                        'Saint Vincent and the Grenadines',
                                        'Samoa',
                                        'San Marino',
                                        'Sao Tome and Principe',
                                        'Saudi Arabia',
                                        'Senegal',
                                        'Seychelles',
                                        'Sierra Leone',
                                        'Singapore',
                                        'Slovakia (Slovak Republic)',
                                        'Slovenia',
                                        'Solomon Islands',
                                        'Somalia',
                                        'South Africa',
                                        'South Georgia and the South Sandwich Islands',
                                        'Spain',
                                        'Sri Lanka',
                                        'St. Helena',
                                        'St. Pierre and Miquelon',
                                        'Sudan',
                                        'Suriname',
                                        'Svalbard and Jan Mayen Islands',
                                        'Swaziland',
                                        'Sweden',
                                        'Switzerland',
                                        'Syrian Arab Republic',
                                        'Taiwan, Province of China',
                                        'Tajikistan',
                                        'Tanzania, United Republic of',
                                        'Thailand',
                                        'Togo',
                                        'Tokelau',
                                        'Tonga',
                                        'Trinidad and Tobago',
                                        'Tunisia',
                                        'Turkey',
                                        'Turkmenistan',
                                        'Turks and Caicos Islands',
                                        'Tuvalu',
                                        'Uganda',
                                        'Ukraine',
                                        'United Arab Emirates',
                                        'United Kingdom',
                                        'United States',
                                        'United States Minor Outlying Islands',
                                        'Uruguay',
                                        'Uzbekistan',
                                        'Vanuatu',
                                        'Venezuela',
                                        'Vietnam',
                                        'Virgin Islands (British)',
                                        'Virgin Islands (U.S.)',
                                        'Wallis and Futuna Islands',
                                        'Western Sahara',
                                        'Yemen',
                                        'Yugoslavia',
                                        'Zambia',
                                        'Zimbabwe',
                                    ];
                                    
                                    $indianStates = ['AR' => 'Arunachal Pradesh', 'AR' => 'Arunachal Pradesh', 'AS' => 'Assam', 'BR' => 'Bihar', 'CT' => 'Chhattisgarh', 'GA' => 'Goa', 'GJ' => 'Gujarat', 'HR' => 'Haryana', 'HP' => 'Himachal Pradesh', 'JK' => 'Jammu and Kashmir', 'JH' => 'Jharkhand', 'KA' => 'Karnataka', 'KL' => 'Kerala', 'MP' => 'Madhya Pradesh', 'MH' => 'Maharashtra', 'MN' => 'Manipur', 'ML' => 'Meghalaya', 'MZ' => 'Mizoram', 'NL' => 'Nagaland', 'OR' => 'Odisha', 'PB' => 'Punjab', 'RJ' => 'Rajasthan', 'SK' => 'Sikkim', 'TN' => 'Tamil Nadu', 'TG' => 'Telangana', 'TR' => 'Tripura', 'UP' => 'Uttar Pradesh', 'UT' => 'Uttarakhand', 'WB' => 'West Bengal', 'AN' => 'Andaman and Nicobar Islands', 'CH' => 'Chandigarh', 'DN' => 'Dadra and Nagar Haveli', 'DD' => 'Daman and Diu', 'LD' => 'Lakshadweep', 'DL' => 'National Capital Territory of Delhi', 'PY' => 'Puducherry'];
                                    
                                @endphp

                                <div class="form-check form-check-inline my-4">
                                    <label for="country">Select Country</label>
                                    <select class="form-control w-50 select ml-2 " name="country" class="country "
                                        value="{{ $student->country }}">

                                        @foreach ($countries as $key => $country)
                                            <option value="{{ $country }}">{{ $country }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="form-check form-check-inline  my-4">
                                    <label for="country">Select State</label>
                                    <select class="form-control select w-50 ml-2 " name="state" class="state"
                                        label="Enter your State" value="{{ $student->state }}">

                                        @foreach ($indianStates as $key => $state)
                                            <option value="{{ $state }}">{{ $state }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control address" name="address"
                                        aria-describedby="addressHelp" value="{{ $student->address }}">
                                    <span class="text-danger">
                                        @error('address')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" class="form-control image" name="image" aria-describedby="imageHelp">
                                    <img src="{{ asset('uploads/cover/' . $student->image) }}" width="70px" height="70px"
                                        alt="image">
                                </div>
                                <div class="form-group">
                                    <label for="hobby">Enter your Hobbies</label>
                                    <input type="string" class="form-control hobby" name="hobby"
                                        aria-describedby="hobbyHelp" value="{{ $student->hobby }}">

                                </div>


                                <br>
                                <div class="btns">

                                    <button class="btn btn-primary my-3">Update</button>
                                    <a href="{{ url('students') }}" class="btn btn-secondary active" role="button"
                                        aria-pressed="true">Cancel</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
