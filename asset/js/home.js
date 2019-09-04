$(document).ready(function () {
     
    $('#searchPhone').autocomplete({
        source: function (request, response) {
            var brand = $('#cari_brand').val();
            console.log(brand); 
            // return false;
            $.ajax({
                url: BASE_URL+"home/autocompletePhone",
                data: { brand:brand, searchText: request.term, maxResults: 7 },
                dataType: "json",
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            id: item.id,
                            image: item.image,
                            DeviceName: item.DeviceName,
                        };
                    }))
                }
            })
        },
        select: function (event, ui) {
            //alert(ui.item ? ("You picked '" + ui.item.DeviceName) : "Nothing selected, input was " + this.value);
            const a = 'àáäâãåèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;';
            const b = 'aaaaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------';
            const p = new RegExp(a.split('').join('|'), 'g');
            // ui.item.DeviceName.replace(/\s+/g, '-'); // Replace spaces with
            // ui.item.DeviceName.replace(p, c => b.charAt(a.indexOf(c))); // Replace special characters
            // ui.item.DeviceName.replace(/&/g, '-and-'); // Replace & with ‘and’
            // ui.item.DeviceName.replace(/[^\w\-]+/g, ''); // Remove all non-word characters
            // ui.item.DeviceName.replace(/\-\-+/g, '-'); // Replace multiple — with single -
            // ui.item.DeviceName.replace(/^-+/, ''); // Trim — from start of text .replace(/-+$/, '') // Trim — from end of text
            var url_title = ui.item.DeviceName.toLowerCase();
            var url_title = url_title.replace(/\s+/g, '-');
            var url_title = url_title.replace(p, c => b.charAt(a.indexOf(c)));
            var url_title = url_title.replace(/&/g, '-and-');
            var url_title = url_title.replace(/[^\w\-]+/g, '');
            var url_title = url_title.replace(/\-\-+/g, '-');
            var url_title = url_title.replace(/^-+/, '');
                
            // console.log(url_title);
            // return false;

            window.location = BASE_URL+"home/detail/"+url_title+"/"+ui.item.id;
            return false;
        },
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        //console.log(item);
        $(ul).addClass('customSuggestList'); //so it can be styled explicitly
        $(ul).addClass('list-group'); //so it can be styled explicitly
        $(".customSuggestList").css({ 'z-index': "1000" });
        return $("<li class='list-group-item-action'>")
            // .append( '<a><img src="'+item.image+'" class="img-thumbnail mr-2 ml-4 mt-2" style="height: 32px; width: 32px; display: block;"><span class="device_name">'+ item.DeviceName + '</span></a>' )
            .append('<a style="display:inline-flex;" class="device_name"><img src="'+item.image+'" class="img-thumbnail mr-2 ml-2" style="height: 40px; width: 38px; display: block;"><span class="text-secondary mr-2 mt-2"><small>'+ item.DeviceName + '</small></span></a>' )
            .appendTo(ul);
    };
    $(".tr-menu").click(function() {
        if($('.cat-menu').css('display') == 'none' || $('.cat-menu').css('display') == '') {
            $(".cat-menu").css({ display: "block" });
        
        } else {
            $(".cat-menu").css({ display: "none" });
        }
        return false;
    });
    //$("#btnSearch").click(function() {
    //$("#form1").submit(function(event) {
        // event.preventDefault();
        // var $form = $( this );
        // var url = $form.attr( 'action' );

        // /* Send the data using post with element id name and name2*/
        // var posting = $.post( url, { q: $('#searchPhone').val()} );

        // /* Alerts the results */
        // posting.done(function( data ) {
        //     //alert('success');
        // });

        // var q = $("#searchPhone").val();
        // $.ajax({
        //     url: BASE_URL+"home/search",
        //     data: {q:q},
        //     success: function(r) {
                
        //     },
        //     error: function(xhr, status, err) {
                
        //     }
        // });
    //})
    
});