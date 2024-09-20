function confirmDelete(event) {
    event.preventDefault();
    console.log(1);
    swal({
        title: "Are you sure?",
        // text: "You won't be able to revert this!",
        type: "warning",
        buttons: {
            confirm: {
                text: "Yes, delete it!",
                className: "btn btn-success",
            },
            cancel: {
                visible: true,
                className: "btn btn-danger",
            },
        },
    }).then((Delete) => {
        if (Delete) {
            swal({
                title: "Deleted!",
                text: "Category has been deleted!",
                type: "success",
                buttons: {
                    confirm: {
                        className: "btn btn-success",
                    },
                },
            }).then(() => {
                event.target.submit();
            });
        } else {
            swal.close();
        }
    });
}

function notificate(state, message) {
    var placementFrom = "top";
    var placementAlign = "right";
    var style = "withicon";
    var content = {};

    content.message = message;
    content.title = "Thông báo";
    if (style == "withicon") {
        content.icon = "fa fa-bell";
    } else {
        content.icon = "none";
    }
    content.url = "index.html";
    content.target = "_blank";

    $.notify(content, {
        type: state,
        placement: {
            from: placementFrom,
            align: placementAlign,
        },
        time: 1000,
        delay: 3000,
    });
}
