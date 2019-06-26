$(function () {
    const baseURL = "https://testapp-c44a1.firebaseio.com/Phonebook/";

    $('#btnLoad').click(loadData());
    $('#btnCreate').click(createContact);

    function createContact() {
        let name = $('#person').val();
        let phone = $('#phone').val();

        if (name !== "" && phone !== "") {
            let contact = {
                name, phone
            };

            $.ajax({
                method: "POST",
                url: baseURL + ".json",
                data: JSON.stringify(contact),
                contentType: "application/json"
            })
                .then(loadData)
                .catch(err => console.log(err))
        }
        $('#person').val('');
        $('#phone').val('');
    }

    function loadData() {
        $.ajax({
            method: "GET",
            url: baseURL + ".json",
        })
            .then(data => {
                printData(data)
            })
            .catch(err => console.log(err));

        function printData(data) {
            $('#phonebook').empty();

            for (let key in data) {
                if (data[key] != null) {
                    let name = data[key]['name'];
                    let phone = data[key]['phone'];

                    $("#phonebook")
                        .append($('<li>')
                            .text(name + ": " + phone)
                            .append(` <a href="#" id="${key}">[Delete]</a>`)
                            .click(deleteContact)
                        );
                }
            }
        }

        function deleteContact() {

            let id = $(this)[0].children[0].id;

            fetch(`${baseURL}/${id}/.json`, {
                method: "DELETE"
            })
                .then(loadData)
        }
    }
});
