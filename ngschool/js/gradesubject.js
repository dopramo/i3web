
<script>
var country_arr = new Array(    "Grade 1",
    "Grade 2",
    "Grade 3",
    "Grade 4",
    "Grade 5",
    "Grade 6",
    "Grade 7",
    "Grade 8",
    "Grade 9",
    "Grade 10",
    "Grade 11",
    "Grade 12",
    "Grade 13");

// States
var s_a = new Array();
s_a[0] = "";
s_a[1] =  "Activity Based Oral English|Environment Education|Mathematics|Sinhala (First Language)|Tamil (Second Language)";
s_a[2] =  "Activity Based Oral English|Environment Education|Mathematics|Sinhala (First Language)|Tamil (Second Language)";
s_a[3] =  "Activity Based Oral English|Environment Education|Mathematics|Sinhala (First Language)|Tamil (Second Language)";
s_a[4] =  "Activity Based Oral English|Environment Education|Mathematics|Sinhala (First Language)|Tamil (Second Language)";
s_a[5] =  "Activity Based Oral English|Environment Education|Mathematics|Sinhala (First Language)|Tamil (Second Language)";
s_a[6] =  "Practical & Technical Skills |Buddhism |Mathematics|Science|Tamil (Second Language)|Geography|Health & Physical Education|Art|History|Civic Education|Drama & Theater|Islam|Carnatic Music syllabus only|Language & Literature|Oriental Music|Dancing|Christianity|Catholicism|Bharatha Natiyam|Sinhala (Second Language)";
s_a[7] =  "Art|Buddhism|Christianity|Geography|Health & Physical Education|History|Language & Literature|Life Competencies & Civic Education|Mathematics|Oriental Music|Practical & Technical Skills|Science";
s_a[8] = "Health & Physical Education|Mathematics|Oriental Music|Science|Life Competencies & Civic Education|Practical & Technical Skills";
s_a[9] =  "Home Economics|Art & Craft|Agro & Food Technology |Aquatic Bio Resource Technology |Business & Accounting Studies |Entrepreneurial Studies|Information Communication Technology|Buddhism|Mathematics|Tamil (Second Language)|Geography|Health & Physical Education|Art |Science |History |Hindi|Japanese|Pali|Civic Education |Drama & Theater|Islam|Carnatic Music syllabus only|Language & Literature|Sanskrit|Oriental Music|Dancing |Christianity|Anthology of Sinhala Literature |Catholicism|Bharatha Natiyam|Appreciation of Sinhala Literary Texts|Design and Construction Technology|Design and Mechanical Technology|Design, Electrical and Electronical Technology|Communication & Media Studies";

s_a[10] =  "Home Economics|Art & Craft|Agro & Food Technology |Aquatic Bio Resource Technology |Business & Accounting Studies |Entrepreneurial Studies|Information Communication Technology|Buddhism|Mathematics|Tamil (Second Language)|Geography|Health & Physical Education|Art |Science |History |Hindi|Japanese|Pali|Civic Education |Drama & Theater|Islam|Carnatic Music syllabus only|Language & Literature|Sanskrit|Oriental Music|Dancing |Christianity|Anthology of Sinhala Literature |Catholicism|Bharatha Natiyam|Appreciation of Sinhala Literary Texts|Design and Construction Technology|Design and Mechanical Technology|Design, Electrical and Electronical Technology|Communication & Media Studies";
s_a[11] =  "Home Economics|Art & Craft|Agro & Food Technology |Aquatic Bio Resource Technology |Business & Accounting Studies |Entrepreneurial Studies|Information Communication Technology|Buddhism|Mathematics|Tamil (Second Language)|Geography|Health & Physical Education|Art |Science |History |Hindi|Japanese|Pali|Civic Education |Drama & Theater|Islam|Carnatic Music syllabus only|Language & Literature|Sanskrit|Oriental Music|Dancing |Christianity|Anthology of Sinhala Literature |Catholicism|Bharatha Natiyam|Appreciation of Sinhala Literary Texts|Design and Construction Technology|Design and Mechanical Technology|Design, Electrical and Electronical Technology|Communication & Media Studies";


function populateStates(countryElementId, stateElementId) {

    var selectedCountryIndex = document.getElementById(countryElementId).selectedIndex;

    var stateElement = document.getElementById(stateElementId);

    stateElement.length = 0; // Fixed by Julian Woods
    stateElement.options[0] = new Option('Select Subject', '');
    stateElement.selectedIndex = 0;

    var state_arr = s_a[selectedCountryIndex].split("|");

    for (var i = 0; i < state_arr.length; i++) {
        stateElement.options[stateElement.length] = new Option(state_arr[i], state_arr[i]);
    }
}

function populateCountries(countryElementId, stateElementId) {
    // given the id of the <select> tag as function argument, it inserts <option> tags
    var countryElement = document.getElementById(countryElementId);
    countryElement.length = 0;
    countryElement.options[0] = new Option('Select Grade', '-1');
    countryElement.selectedIndex = 0;
    for (var i = 0; i < country_arr.length; i++) {
        countryElement.options[countryElement.length] = new Option(country_arr[i], country_arr[i]);
    }

    // Assigned all countries. Now assign event listener for the states.

    if (stateElementId) {
        countryElement.onchange = function () {
            populateStates(countryElementId, stateElementId);
        };
    }
}
    </script>