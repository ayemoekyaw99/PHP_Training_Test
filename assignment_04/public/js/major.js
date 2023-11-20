$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Handle form submission to create a new major
    $('#createMajorForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/major/store',
            data: {
                name: $('#majorName').val(),
            },
            success: function(response) {
                if (response.success) {
                    $('#majorsList').append(`
                                            <tr>
                                                <td>${response.major.id}</td>
                                                <td>${response.major.name}</td>
                                                <td>
                                                    <button class="deleteMajor btn btn-danger btn-sm" data-id="${response.major.id}">Delete</button>
                                                </td>
                                            </tr>
                                            `);
                    $('#createMajorForm')[0].reset();
                }
            },
        });
    });

    // Handle click on delete button
    $('#majorsList').on('click', '.deleteMajor', function() {
        const majorId = $(this).data('id');
        $.ajax({
            url: `/major/delete/${majorId}`,
            method: 'DELETE',
            success: function(response) {
                if (response.success) {
                    $(`[data-id="${majorId}"]`).closest('tr').remove();
                }
            },
        });
    });
});