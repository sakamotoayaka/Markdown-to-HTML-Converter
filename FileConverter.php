<?php
// Parsedownの読み込み（Parsedown.phpのパスを指定）
require 'Parsedown.php';  // 適切なパスに置き換えてください

// コマンドライン引数のチェック
if ($argc != 4) {
    echo "Usage: php FileConverter.php markdown inputfile outputfile\n";
    exit(1);
}

$command = $argv[1];
$inputFile = $argv[2];
$outputFile = $argv[3];

// 入力ファイルの存在チェック
if (!file_exists($inputFile)) {
    echo "Could not open input file: $inputFile\n";
    exit(1);
}

// コマンドが'markdown'である場合にMarkdownをHTMLに変換
if ($command === 'markdown') {
    $Parsedown = new Parsedown();
    $markdown = file_get_contents($inputFile);
    $html = $Parsedown->text($markdown);
    file_put_contents($outputFile, $html);
    echo "Conversion successful! Output written to $outputFile\n";
} else {
    echo "Unknown command: $command\n";
    exit(1);
}
?>
