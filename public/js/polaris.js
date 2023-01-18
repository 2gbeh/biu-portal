

const togglePassword = () => {
    const el = `#spy`;
    $(el).on("click", () => {
        $("#password").prop("type", (i, state) => {
            if (state === "password") {
                $(el).prop({
                    class: "fi fi-rs-eye-crossed",
                    title: "Hide",
                });
                return "text";
            } else {
                $(el).prop({
                    class: "fi fi-rs-eye",
                    title: "Show",
                });
                return "password";
            }
        });
    });
};

function autofill(bool) {
    this.TYPES = {
        text: "John Doe",
        email: "example@domain.com",
        tel: "01234567891",
        search: "john",
        password: "_Strongp@ssw0rd",
        number: 1234,
        url: "https://www.hwplabs.com/",
        color: "#0093DD",
        date: "1992-09-15",
        time: "12:00:00",
        "datetime-local": "1992-09-15 12:00 PM",
        week: 52,
        month: 12,
        // hidden: 1,
    };

    if (bool === true || bool === 1) {
        var selectors = [];
        // INPUT TYPES
        var myTypes = this.TYPES;
        for (var i in myTypes) {
            selectors = document.querySelectorAll('input[type="' + i + '"]');
            for (var j in selectors) selectors[j].value = myTypes[i];
        }
        // INPUT TYPE PASSWORD (SHOW/HIDE)
        var myPassword = document.querySelectorAll('input[type="password"]');
        for (var i = 0; i < myPassword.length; i++) {
            myPassword[i].addEventListener("dblclick", function () {
                this.type = "text";
            });
        }
        // INPUT TYPE FILE (NOT REQUIRED)
        var myFile = document.querySelectorAll('input[type="file"]');
        for (var i = 0; i < myFile.length; i++) myFile[i].required = false;
        // SELECT TAG
        var mySelect = document.getElementsByTagName("select");
        for (var i = 0; i < mySelect.length; i++) {
            selectors = mySelect[i].getElementsByTagName("option");
            selectors[1].selected = true;
        }
        // RADIO BUTTON
        var key = "",
            group = {};
        var myRadio = document.querySelectorAll('input[type="radio"]');
        for (var i = 0; i < myRadio.length; i++) {
            var j = myRadio[i].name;
            selectors = document.querySelectorAll('input[name="' + j + '"]');
            selectors[0].checked = true;
        }
        // CHECKBOX
        var myCheckbox = document.querySelectorAll('input[type="checkbox"]');
        for (var i in myCheckbox) myCheckbox[i].checked = true;
        // RANGE
        var myRange = document.querySelectorAll('input[type="range"]');
        for (var i in myRange) myRange[i].value = 5;
        // TEXTAREA
        var myTextarea = document.querySelectorAll("textarea");
        for (var i in myTextarea)
            myTextarea[i].value = "1 Liberty way, Uwasota, BC 300283, ED.";
    }
}
