<!DOCTYPE html>
<?php 
header("Content-type: text/html; charset=utf-8"); 

$md_path_all = $lister->getListedPath();
$suffix_array = explode('.', $_SERVER['HTTP_HOST']);
$suffix = end($suffix_array);
$md_path = explode($suffix, $md_path_all);
if($md_path[1] != ""){
    $md_path_last = substr($md_path[1], -1);;
    if($md_path_last != "/"){
        $md_file = ".".$md_path[1]."/README.html";
    }else{
        $md_file = ".".$md_path[1]."README.html";
    }
}
if(file_exists($md_file)){
    $md_text = file_get_contents($md_file);
}else{
    $md_text = "";
}
?>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DirectoryLister网盘Discuz!4.1.0主题 <?php echo $md_path_all; ?></title>
    <link rel="shortcut icon" href="resources/themes/Discuz41/img/folder.png" />
    
    <?php include('header.php'); ?>
    
    <link rel="stylesheet" href="resources/themes/bootstrap/css/font-awesome.min.css" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Microsoft YaHei', '宋体', Tahoma, Arial, sans-serif;
            background: #A1B5D8;
            color: #1A2B44;
            font-size: 12px;
            min-height: 100vh;
            padding: 20px;
        }
        
        /* 主容器 - 用户可以自由修改宽度 */
        .wrapper {
            width: 100%;
            max-width: 1200px;  /* 默认1200px，用户可以修改 */
            margin: 0 auto;
        }
        
        .custom-width {
        }
        
        .header {
            background: linear-gradient(135deg, #ffffff 0%, #f5f9ff 100%);
            border-radius: 12px 12px 0 0;
            border: 2px solid #3d6d9e;
            border-bottom: none;
            overflow: hidden;
        }
        
        .header-top {
            padding: 20px 25px;
            border-bottom: 2px solid #3d6d9e;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #0d3a6f;
        }
        
        .logo small {
            font-size: 14px;
            color: #3d6d9e;
            margin-left: 10px;
        }
        
        .nav-bar {
            background: linear-gradient(to bottom, #3d6d9e 0%, #1e4a7a 100%);
            padding: 8px 20px;
        }
        
        .nav-links {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 14px;
            display: inline-block;
        }
        
        .nav-links a:hover {
            background: #5d8dc0;
        }
        
        .breadcrumb {
            background: rgba(255, 255, 255, 0.7);
            padding: 12px 25px;
            border-bottom: 1px solid #c2d2e4;
            font-size: 13px;
        }
        
        .breadcrumb a {
            color: #1e4a7a;
            text-decoration: none;
        }
        
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        
        .breadcrumb span {
            color: #666;
            margin: 0 5px;
        }
        
        .main-content {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 0 0 12px 12px;
            padding: 25px;
            border: 2px solid #3d6d9e;
            border-top: none;
            margin-bottom: 5px; 
        }
        
        .announcement {
            background: #fffbe6;
            border: 1px solid #ffd78c;
            padding: 12px 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            color: #7d5d23;
        }
        
        .announcement i {
            font-style: normal;
            background: #ffd78c;
            padding: 2px 8px;
            border-radius: 4px;
            margin-right: 10px;
        }
        
        .file-stats {
            background: #e6f0fa;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            color: #1e4a7a;
            font-size: 14px;
        }
        
        .file-stats span {
            background: #1e4a7a;
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            margin-left: 10px;
        }
        
        #directory-list-header {
            background: linear-gradient(to bottom, #3d6d9e 0%, #1e4a7a 100%);
            border: 1px solid #c2d2e4;
            border-radius: 6px 6px 0 0;
            color: white;
            font-weight: bold;
            padding: 12px 15px;
        }
        
        .header-row {
            display: flex;
            width: 100%;
        }
        
        .header-name {
            flex: 6;
            padding-left: 5px;
        }
        
        .header-size {
            flex: 2;
            text-align: right;
        }
        
        .header-time {
            flex: 4;
            text-align: right;
        }
        
        #directory-listing {
            margin: 0;
            padding: 0;
            list-style: none;
            border: 1px solid #c2d2e4;
            border-top: none;
            border-radius: 0 0 6px 6px;
        }
        
        #directory-listing li {
            margin: 0;
            padding: 0;
            background: white;
            border-bottom: 1px solid #d4e2f2;
            position: relative;
        }
        
        #directory-listing li:last-child {
            border-bottom: none;
        }
        
        #directory-listing li:hover {
            background: #f0f7ff;
        }
        
        #directory-listing a {
            display: flex;
            width: 100%;
            padding: 12px 15px;
            color: #0d3a6f;
            text-decoration: none;
            align-items: center;
        }
        
        #directory-listing a:hover {
            color: #1e4a7a;
        }
        
        #directory-listing .file-name {
            flex: 6;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding-right: 10px;
        }
        
        #directory-listing .file-size {
            flex: 2;
            text-align: right;
            color: #666;
            font-size: 13px;
            white-space: nowrap;
            padding-right: 10px;
        }
        
        #directory-listing .file-modified {
            flex: 4;
            text-align: right;
            color: #666;
            font-size: 13px;
            white-space: nowrap;
        }
        
        #directory-listing .fa {
            color: #4B6A9C;
            margin-right: 8px;
            width: 18px;
        }
        
        .web-link-button {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: #e6f0fa;
            border: 1px solid #3d6d9e;
            border-radius: 3px;
            padding: 2px 8px;
            color: #1e4a7a !important;
            font-size: 11px;
            text-decoration: none;
            width: auto !important;
            display: inline-block !important;
        }
        
        .web-link-button:hover {
            background: #3d6d9e;
            color: white !important;
        }
        
        .empty-folder {
            text-align: center;
            padding: 50px;
            background: white;
            border-radius: 5px;
            list-style: none;
        }
        
        .empty-folder i {
            font-size: 48px;
            margin-bottom: 20px;
            color: #3d6d9e;
        }
        
        .empty-folder h3 {
            color: #1e4a7a;
            margin-bottom: 10px;
        }
        
        .empty-folder p {
            color: #666;
        }
        
        .readme-section {
            background: #f0f5fd;
            border: 2px solid #3d6d9e;
            border-radius: 8px;
            margin-top: 5px;      
            margin-bottom: 5px;    
            overflow: hidden;
        }
        
        .readme-title {
            background: linear-gradient(to bottom, #ecf3fa 0%, #d4e2f2 100%);
            padding: 10px 20px;
            border-bottom: 1px solid #c2d2e4;
            font-weight: bold;
            color: #1e4a7a;
            font-size: 14px;
        }
        
        .readme-title i {
            margin-right: 5px;
            color: #1e4a7a;
        }
        
        .readme-content {
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }
        
        .readme-content h4 {
            color: #1e4a7a;
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        
        .readme-content p {
            margin: 10px 0;
        }
        
        .friend-links {
            background: #f0f5fd;
            border: none;
            border-radius: 8px;
            margin-top: 5px;
            overflow: hidden;
            height: 45px;
            display: flex;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .friend-links-title {
            background: linear-gradient(to bottom, #3d6d9e 0%, #1e4a7a 100%);
            color: white;
            padding: 0 20px;
            height: 100%;
            display: flex;
            align-items: center;
            font-weight: bold;
            white-space: nowrap;
        }
        
        .friend-links-title i {
            margin-right: 5px;
        }
        
        .friend-links-content {
            flex: 1;
            padding: 0 15px;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        .friend-links-content a {
            color: #1e4a7a;
            text-decoration: none;
            margin-right: 20px;
            font-size: 13px;
            display: inline-block;
            line-height: 45px;
        }
        
        .friend-links-content a:hover {
            color: #0d3a6f;
            text-decoration: underline;
        }
        
        .footer {
            background: linear-gradient(135deg, #f0f5fd 0%, #ffffff 100%);
            border-radius: 12px;
            padding: 8px 25px;
            margin-top: 5px;
            border: none;
            text-align: center;
            color: #1e4a7a;
            height: 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .footer p {
            margin: 0;
            line-height: 1.5;
        }
        
        .footer a {
            color: #0d3a6f;
            text-decoration: none;
            margin: 0 5px;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            body { padding: 10px; }
            
            .logo {
                text-align: center;
                margin-bottom: 10px;
            }
            
            .logo small {
                display: block;
                margin: 5px 0 0 0;
            }
            
            .nav-links {
                justify-content: center;
            }
            
            .header-time,
            #directory-listing .file-modified {
                display: none;
            }
            
            .header-name,
            #directory-listing .file-name {
                flex: 8;
            }
            
            .header-size,
            #directory-listing .file-size {
                flex: 4;
            }
            
            .friend-links {
                height: auto;
                flex-direction: column;
            }
            
            .friend-links-title {
                width: 100%;
                justify-content: center;
                padding: 8px 0;
            }
            
            .friend-links-content {
                padding: 8px 15px;
                text-align: center;
                white-space: normal;
            }
            
            .friend-links-content a {
                line-height: 30px;
                margin: 0 10px 5px;
            }
            
            .footer {
                height: auto !important;
                min-height: 55px;
                padding: 8px 15px !important;
            }
        }
    </style>
    
    <?php file_exists('analytics.inc') ? include('analytics.inc') : false; ?>
</head>
<body>
    <div class="wrapper">
        <!-- 头部 -->
        <div class="header">
            <div class="header-top">
                <div class="logo">
                    DirectoryLister网盘Discuz!4.1.0主题
                    <small>软件下载</small>
                </div>
            </div>
            
            <!-- 导航栏 -->
            <div class="nav-bar">
                <div class="nav-links">
                    <a href="?dir=.">首页</a>
                    <a href="#">系统工具</a>
                    <a href="#">网络软件</a>
                    <a href="#">编程开发</a>
                    <a href="#">热门下载</a>
                </div>
            </div>
            
            <div class="breadcrumb">
                📁 当前位置： 
                <?php 
                $breadcrumbs = $lister->listBreadcrumbs();
                $show_breadcrumbs = array_slice($breadcrumbs, 1);
                ?>
                <?php foreach($show_breadcrumbs as $index => $breadcrumb): ?>
                    <?php if ($index > 0): ?>
                        <span>/</span>
                    <?php endif; ?>
                    <?php if ($index < count($show_breadcrumbs)-1): ?>
                        <a href="<?php echo $breadcrumb['link']; ?>"><?php echo $breadcrumb['text']; ?></a>
                    <?php else: ?>
                        <?php echo $breadcrumb['text']; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if(empty($show_breadcrumbs)): ?>
                    根目录
                <?php endif; ?>
            </div>
        </div>
                <div class="main-content">
            <div class="announcement">
                <i>📢 公告</i> 所有软件均为绿色版，放心下载。如遇到问题请在README中查看说明。
            </div>
            
            <div class="file-stats">
                📊 共有 <span><?php echo count($dirArray); ?></span> 个文件/文件夹可供下载
            </div>
            
            <?php if($lister->getSystemMessages()): ?>
                <?php foreach ($lister->getSystemMessages() as $message): ?>
                    <div class="alert alert-<?php echo $message['type']; ?>" style="margin-bottom: 15px;">
                        <?php echo $message['text']; ?>
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <div id="directory-list-header">
                <div class="header-row">
                    <span class="header-name">文件名称</span>
                    <span class="header-size">文件大小</span>
                    <span class="header-time">最后修改时间</span>
                </div>
            </div>
            
            <ul id="directory-listing">
                <?php if(empty($dirArray)): ?>
                    <li class="empty-folder">
                        <i class="fa fa-folder-open-o"></i>
                        <h3>此文件夹暂无文件</h3>
                        <p>您可以上传文件到这个目录</p>
                    </li>
                <?php else: ?>
                    <?php foreach($dirArray as $name => $fileInfo): ?>
                        <li>
                            <a href="<?php echo $fileInfo['url_path']; ?>">
                                <span class="file-name">
                                    <i class="fa <?php echo $fileInfo['icon_class']; ?>"></i>
                                    <?php echo $name; ?>
                                </span>
                                <span class="file-size">
                                    <?php echo $fileInfo['file_size']; ?>
                                </span>
                                <span class="file-modified">
                                    <?php echo $fileInfo['mod_time']; ?>
                                </span>
                            </a>
                            <?php if (!is_file($fileInfo['file_path']) && $lister->containsIndex($fileInfo['file_path'])): ?>
                                <a href="<?php echo $fileInfo['file_path']; ?>" class="web-link-button" <?php if($lister->externalLinksNewWindow()): ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-external-link"></i> 访问
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        
        <?php if(!empty($md_text)): ?>
            <div class="readme-section">
                <div class="readme-title">
                    <i class="fa fa-book"></i> 主题简介
                </div>
                <div class="readme-content">
                    <h4>DirectoryLister网盘Discuz!4.1.0主题</h4>
                    <div style="margin-top: 20px;">
                        <?php echo $md_text; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <?php include('links.php'); ?>
        
        <?php include('footer.php'); ?>
    </div>
</body>
</html>