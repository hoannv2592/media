<section class="content">
    <div class="container-fluid">
        <!-- File Upload | Drag & Drop OR With Click & Choose -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            FILE UPLOAD - DRAG &amp; DROP OR WITH CLICK &amp; CHOOSE
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?= $this->Flash->render() ?>
                        <div class="upload-frm">
                            <?php echo $this->Form->create($uploadData, ['type' => 'file']); ?>
                            <?php echo $this->Form->input('file', [
                                    'type' => 'file',
                                    'class' => 'form-control']
                            ); ?>
                            <?php echo $this->Form->button(__('Upload File'), [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger waves-effect m-t-10']
                            ); ?>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            FILE UPLOAD - DRAG &amp; DROP OR WITH CLICK &amp; CHOOSE
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?= $this->Flash->render() ?>
                        <div class="upload-frm">
                            <?php echo $this->Form->create($uploadData, ['type' => 'file']); ?>
                            <?php echo $this->Form->input('file', [
                                    'type' => 'file',
                                    'class' => 'form-control']
                            ); ?>
                            <?php echo $this->Form->button(__('Upload File'), [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger waves-effect m-t-10']
                            ); ?>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Uploaded Files</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="content">
                            <!-- Table -->
                            <table class="table">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="20%">File</th>
                                    <th width="12%">Upload Date</th>
                                </tr>
                                <?php if($filesRowNum > 0): $count = 0;
                                foreach($files as $file): $count++;?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td class="mhz-news-img">
                                            <img src="<?= '/'.$file->path ?>" width="220px" height="150px">
                                        </td>
                                        <td><?php echo $file->created; ?></td>
                                    </tr>
                                <?php endforeach; else:?>
                                <tr><td colspan="3">No file(s) found......</td>
                                    <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
