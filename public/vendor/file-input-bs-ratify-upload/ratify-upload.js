$.fn.ratifyUpload = function (options) {

    var self = this;
    var currentParent = $(this).parent();

    var parentId = `ratify-parent-${getGuid()}`;

    $(currentParent).attr("id", parentId);

    /** Check if jQuery is Loaded **/
    if (!window.jQuery) {
        throw new TypeError('Ratify Upload requires jQuery. jQuery must be included before Ratify Upload.')
    }

    if (typeof $().emulateTransitionEnd !== 'function') {
        throw new TypeError('Ratify Upload requires Bootstrap Js and Css. Bootstrap must be included before Ratify Upload.')
    }

    var labelFile = $(`<label class="lbl-file form-control w-80">Select File</label>`)

    var divChange = $(`
                        <div class="div-change-group">
                            <button type="button" class="btn btn-browse" placeholder="Name">Browse</button> 
                            <button type="button" class="btn btn-remove hidden" placeholder="Name">Remove</button> 
                        </div>
                     `);
   
    $(this).after(labelFile)
    $(labelFile).after(divChange);
    this.addClass("hidden")


    $(this).change(function () {
        $(currentParent).find('.btn-browse').addClass('btn-change');
        $(currentParent).find('.btn-browse').text("Change");
        $(currentParent).find('.btn-browse').removeClass('btn-browse')
        $(currentParent).find('.btn-remove').removeClass('hidden');

        $(currentParent).find('.lbl-file').removeClass('w-80');
        $(currentParent).find('.lbl-file').addClass('w-60');

        var fileName = $(this).get(0).files[0].name;
        $(currentParent).find('.lbl-file').text(fileName)
    });

    $(document).on("click", `#${parentId} .btn-browse`, function () {
        $(self).trigger('click');
    });

    $(document).on("click", `#${parentId} .btn-remove`, function () {
        $(self).val("");
        $(currentParent).find('.btn-remove').addClass('hidden');
        $(currentParent).find('.lbl-file').removeClass('w-60');
        $(currentParent).find('.lbl-file').addClass('w-80');
        $(currentParent).find('.lbl-file').text("Select File");

        $(currentParent).find('.btn-change').text("Browse");
        $(currentParent).find('.btn-change').addClass('btn-browse');
        $(currentParent).find('.btn-change').removeClass('btn-change')
    });


    $(document).on("click", `#${parentId} .btn-change`, function () {
        $(self).trigger('click');
    });

    return this;
}

function getGuid() {
     return Date.now() + ( (Math.random()*100000).toFixed());
}


