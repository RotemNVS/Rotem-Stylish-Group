
/*
one page menu
 */
jQuery(document).ready(function ($) {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="revo_menu_name[]"  class="widefat valid revo_vdf"/><a href="#" class="remove_field"><i class="fa fa-times" aria-hidden="true"></i></a></div>'); //add input box
        }
    });

    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
jQuery(document).ready(function ($) {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap2"); //Fields wrapper
    var add_button = $(".add_field_button2"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="revo_munu_url[]"  class="widefat valid revo_vdf"/><a href="#" class="remove_field"><i class="fa fa-times" aria-hidden="true"></i></a></div>'); //add input box
        }
    });

    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
jQuery(document).ready(function($) {

    var wordpress_ver =  revo_admin_obj.version, upload_button;
    $(".revo_upload_image_button").click(function(event) {

        upload_button = $(this);
        var frame;
        if (wordpress_ver >= "3.5") {
            event.preventDefault();
            if (frame) {
                frame.open();
                return;
            }
            frame = wp.media();
            frame.on( "select", function() {
                // Grab the selected attachment.
                var attachment = frame.state().get("selection").first();
                frame.close();
                if (upload_button.parent().prev().children().hasClass("tax_list")) {
                    upload_button.parent().prev().children().val(attachment.attributes.url);
                    upload_button.parent().prev().prev().children().attr("src", attachment.attributes.url);
                }
                else
                    $("#taxonomy_image").val(attachment.attributes.url);
            });
            frame.open();
        }
        else {
            tb_show("", "media-upload.php?type=image&amp;TB_iframe=true");
            return false;
        }
    });

    $(".revo_remove_image_button").click(function() {
        $(".taxonomy-image").attr("src", "' . revo_IMAGE_PLACEHOLDER . '");
        $("#taxonomy_image").val("");
        $(this).parent().siblings(".title").children("img").attr("src","' . revo_IMAGE_PLACEHOLDER . '");
        $(".inline-edit-col :input[name=\'taxonomy_image\']").val("");
        return false;
    });

    if (wordpress_ver < "3.5") {
        window.send_to_editor = function(html) {
            imgurl = $("img",html).attr("src");
            if (upload_button.parent().prev().children().hasClass("tax_list")) {
                upload_button.parent().prev().children().val(imgurl);
                upload_button.parent().prev().prev().children().attr("src", imgurl);
            }
            else
                $("#taxonomy_image").val(imgurl);
            tb_remove();
        }
    }

    $(".editinline").click(function() {
        var tax_id = $(this).parents("tr").attr("id").substr(4);
        var thumb = $("#tag-"+tax_id+" .thumb img").attr("src");

        if (thumb != "' . revo_IMAGE_PLACEHOLDER . '") {
            $(".inline-edit-col :input[name=\'taxonomy_image\']").val(thumb);
        } else {
            $(".inline-edit-col :input[name=\'taxonomy_image\']").val("");
        }

        $(".inline-edit-col .title img").attr("src",thumb);
    });
});/**
 * Created by Pro on 25.04.2016.
 */


jQuery(document).ready(function($) {

    // Uploading files
    var file_frame;

    jQuery.fn.upload_revo_image = function( button ) {
        var button_id = button.attr('id');
        var field_id = button_id.replace( '_button', '' );

        // If the media frame already exists, reopen it.
        if ( file_frame ) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery( this ).data( 'uploader_title' ),
            button: {
                text: jQuery( this ).data( 'uploader_button_text' ),
            },
            multiple: false
        });

        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            var attachment = file_frame.state().get('selection').first().toJSON();
            jQuery("#"+field_id).val(attachment.id);
            jQuery("#revoimagediv img").attr('src',attachment.url);
            jQuery( '#revoimagediv img' ).show();
            jQuery( '#' + button_id ).attr( 'id', 'remove_revo_image_button' );
            jQuery( '#remove_revo_image_button' ).text( 'Remove revo image' );
        });

        // Finally, open the modal
        file_frame.open();
    };

    jQuery('#revoimagediv').on( 'click', '#upload_revo_image_button', function( event ) {
        event.preventDefault();
        jQuery.fn.upload_revo_image( jQuery(this) );
    });

    jQuery('#revoimagediv').on( 'click', '#remove_revo_image_button', function( event ) {
        event.preventDefault();
        jQuery( '#upload_revo_image' ).val( '' );
        jQuery( '#revoimagediv img' ).attr( 'src', '' );
        jQuery( '#revoimagediv img' ).hide();
        jQuery( this ).attr( 'id', 'upload_revo_image_button' );
        jQuery( '#upload_revo_image_button' ).text( 'Set revo image' );
    });

});