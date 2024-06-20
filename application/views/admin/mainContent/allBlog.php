<!-- allBlog.php -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog Content</h6>
            </div>

            <!-- Validation Errors and Flash Messages -->
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Blog Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Author</th>
                                <th>Published at</th>
                                <th>Edit Blog</th>
                                <th>Delete Blog</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($latest_blogs as $blog) : ?>
                                <tr>
                                    <td><?php echo $blog->blogId; ?></td>
                                    <td><?php echo $blog->blogTitle; ?></td>
                                    <td>
                                        <?php echo $blog->truncated_desc; ?>
                                        <!-- Read more link to open modal -->
                                        <a href="#" class="btn btn-sm read-more text-info font-weight-bold" data-toggle="modal" data-target="#blogModal_<?php echo $blog->blogId; ?>">Read more</a>
                                    </td>
                                    <td><?php echo $blog->userName; ?></td>
                                    <td><?php echo date('M d, Y', strtotime($blog->blogDate)); ?></td>
                                    <td>
                                        <!-- Edit button -->
                                        <a href="<?php echo base_url('BlogAdmin/editBlog/' . $blog->blogId); ?>" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <!-- Delete button -->
                                        <a href="<?php echo base_url('BlogAdmin/deleteBlog/' . $blog->blogId); ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>

                                <!-- Modal for each blog -->
                                <div class="modal fade" id="blogModal_<?php echo $blog->blogId; ?>" tabindex="-1" role="dialog" aria-labelledby="blogModalLabel_<?php echo $blog->blogId; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="blogModalLabel_<?php echo $blog->blogId; ?>"><?php echo $blog->blogTitle; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Description:</strong> <?php echo $blog->blogBody; ?></p>
                                                <p><strong>Author:</strong> <?php echo $blog->userName; ?></p>
                                                <p><strong>Published at:</strong> <?php echo date('M d, Y', strtotime($blog->blogDate)); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
