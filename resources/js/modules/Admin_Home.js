;(function(app, $, undefined) {
    app.modules.push({
        moduleName: 'Admin_Home',
        initModule: function(config) {
            let module = this;

            // Format Global Settings JSON:
            if($('#settings textarea').length === 1) {
                let jsonStringified = JSON.stringify(JSON.parse($('#settings textarea').text()) || "{}", undefined, "\t" );
                $('#settings textarea').html( jsonStringified );
                $('.autosize').trigger('autosize.resize'); // Ensure textarea is grown vertically to fit all JSON code.
            }

            // Disable TAB key from skipping to the next element in the HTML page
            // when editing JSON:
            $("body").on('keydown', '#settings textarea', function(event) {
                let keyCode = event.keyCode || event.which;
                if(keyCode === 9) {
                    event.preventDefault();
                    let start = this.selectionStart;
                    let end = this.selectionEnd;
                    // set textarea value to: text before caret + tab + text after caret
                    $(this).val($(this).val().substring(0, start) + "\t" + $(this).val().substring(end));
                    // put caret at right position again
                    this.selectionStart =
                        this.selectionEnd = start + 1;
                }
            });
        }
    });
})(window.NicholasMorgan, window.jQuery);