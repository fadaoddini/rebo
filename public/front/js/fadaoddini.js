function addtoo(id) {



    var name = $("#name" + id + "").val();


    var text_back = name + ' به سبد خرید اضافه گردید ';
    var type = "GET";

    $.ajax({

        url: "{{ route('addtoo') }}",

        type: type,

        data: {

            id: id,
            name: name

        },

        success: function (response) {

            if (response) {


                console.log(response);
                $('#msg').text(text_back);
            } else {
                $('#msg').text('خطا در کنترلر کلیک اجاکسی');
            }

        }

    });


}
