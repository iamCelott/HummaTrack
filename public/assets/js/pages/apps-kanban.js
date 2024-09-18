var kanbanOne = document.getElementById("to_do"),
    kanbanTwo = document.getElementById("in_progress"),
    kanbanThree = document.getElementById("review"),
    kanbanFour = document.getElementById("done");

function logMovement(evt) {
    var fromKanban = evt.from.id;
    var toKanban = evt.to.id;
    var itemId = evt.item.getAttribute("data-id");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/api/tasks/" + itemId + "/update_status",
        method: "PUT",
        data: {
            id: itemId,
            status: toKanban,
        },
        error: function (xhr, status, error) {
            console.log(xhr, status, error);
            alert("Terjadi kesalahan saat memindahkan item: " + error);
        },
    });
}

new Sortable(kanbanOne, {
    group: "shared",
    animation: 150,
    onEnd: logMovement,
});

new Sortable(kanbanTwo, {
    group: "shared",
    animation: 150,
    onEnd: logMovement,
});

new Sortable(kanbanThree, {
    group: "shared",
    animation: 150,
    onEnd: logMovement,
});

new Sortable(kanbanFour, {
    group: "shared",
    animation: 150,
    onEnd: logMovement,
});
