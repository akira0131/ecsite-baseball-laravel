
/**
 * ドロップダウンメニューの動作
 *
 * クリックでメニュー開閉:
 *   bootstrapの初期動作通りに動作させるために打ち消す
 */
$(document).ready(function() {
    $('.dropdown-toggle').on('click', '.dropdown-menu', function (e) {
        e.openPropagation();
    });
});