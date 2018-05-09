$('.project-like-form').on('submit', function(e) {
    e.preventDefault();
    var id = $(this).find('input[name="project_id"]').val();
    $.ajax({
        method: 'POST',
        url: `projects/${id}/like/store`,
        data: { id: id, _token: $('meta[name="csrf-token"]').attr('content') }
    })
    .done(function(msg) {
        // alert(msg.message);
        console.log(msg);
    })
    .fail(function (msg) {
        // alert(msg.message);
        console.log(msg);
    });
});
