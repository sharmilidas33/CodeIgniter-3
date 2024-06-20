<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Recent Posts</h1>
        <!-- <a href="#" class="btn btn-primary"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Total Blogs -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-blog fa-2x text-gray-300"></i>
                        </div>
                        <div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Blogs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_blogs; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Blog Content Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Blog Content</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($latest_blogs as $blog) : ?>
                                    <tr>
                                        <td><?php echo $blog->blogTitle; ?></td>
                                        <td>
                                            <?php echo $blog->truncated_desc; ?>
                                            <!-- Read more link to open modal -->
                                            <a href="#" class="btn btn-sm btn-info read-more" data-toggle="modal" data-target="#blogModal_<?php echo $blog->blogId; ?>">Read more</a>
                                        </td>
                                        <td><?php echo $blog->userName; ?></td>
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

</div>
