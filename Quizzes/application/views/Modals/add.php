<!-- Add page -->
<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <form>
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">أضف صفحة</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>عنوان الصفحة</label>
                        <input type="text" class="form-control" placeholder="عنوان الصفحة" />
                    </div>
                    <div class="form-group">
                        <label>محتوى الصفحة</label>
                        <textarea id="editor1" type="text" class="form-control" placeholder="محتوى الصفحة"></textarea>
                        <script>
                                CKEDITOR.replace( 'editor1' );
                        </script>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" /> منشور</label>
                    </div>
                    <div class="form-group">
                        <label>الوسوم</label>
                        <input type="text" class="form-control" placeholder="add some tags ..." />
                    </div>
                    <div class="form-group">
                        <label>الوصف</label>
                        <input type="text" class="form-control" placeholder="add Meta Description" />
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                  <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                </div>
            </form>
              </div>
            </div>
     </div>
