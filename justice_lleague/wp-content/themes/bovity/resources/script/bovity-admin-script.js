( function( $ ){
    $( document ).ready( function(){
      $( '.bovity-btn-get-started' ).on( 'click', function( e ) {
          e.preventDefault();
          $( this ).html( 'Processing.. Please wait' ).addClass( 'updating-message' );
          $.post( bovity_ajax_object.ajax_url, { 'action' : 'install_act_plugin' }, function( response ){
              location.href = 'customize.php?bovity_notice=dismiss-get-started';
          } );
      } );
    } );

}( jQuery ) )


jQuery(document).ready(function($){
  /*Drag and drop to change order*/
  $(".avadanta-repeater-field-control-wrap").sortable({
    orientation: "vertical",
    update: function( event, ui ) {
      avadanta_refresh_repeater_values();
    }
  });   
    /**
     * Section re-order
    */
    $('#tm-sections-reorder').sortable({
        cursor: 'move',
        update: function(event, ui) {
            var section_ids = '';
            $('#tm-sections-reorder li').css('cursor','default').each(function() {
                var section_id = jQuery(this).attr( 'data-section-name' );
                section_ids = section_ids + section_id + ',';
            });
            $('#shortui-order').val(section_ids);
            $('#shortui-order').trigger('change');
        }
    });


    //Scroll to section
    $('body').on('click', '#sub-accordion-panel-avadanta_homepage_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    });

});