<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jess";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}




echo "<h2>All Issues</h2>";

$issues = array();

$query = "SELECT issue FROM queue ";
//ORDER BY id DESC";
$result = mysqli_query($conn, $query) or die ("Could not select.");
while ($row = mysqli_fetch_array($result)){
    extract($row);

    //echo "$issue<br>";
    array_push($issues, $issue);
    
}	
$issues_i1 = implode(" ", $issues); // all sentences merged to one string
$issues_i1 = strtolower($issues_i1); //everything to lowercase
$issues_e = explode(" ", $issues_i1); //all word split into tokens 
$issues_i = implode("/", $issues_e); //testing that word were properly split
//echo"$issues_i";

$issues1 = array();

$remove = array(",","?","!", ":", "(", ")");
//remove white space and punctuation from all tokens
for ($i = 0; $i < count($issues_e); $i++){

    $updatedToken = str_replace($remove, "", $issues_e[$i]);

    array_push($issues1, $updatedToken);

}

//$issues_i = implode("/", $issues1); //testing that word were properly split
//echo"$issues_i";

$stopwords = array(
    ',','.','!', ':', '?',
    "a","about","above","after","again","against",
    "all",
    "am",
    "an",
    "and",
    "any",
    "are",
    "aren't",
    "as",
    "at",
    "be",
    "because",
    "been",
    "before",
    "being",
    "below",
    "between",
    "both",
    "but",
    "by",
    "can",
    "can't",
    "cannot",
    "could",
    "couldn't",
    "did",
    "didn't",
    "do",
    "does",
    "doesn't",
    "doing",
    "don't",
    "during",
    "each",
    "few",
    "for",
    "from",
    "further",
    "had",
    "hadn't",
    "has",
    "hasn't",
    "have",
    "haven't",
    "having",
    "he",
    "he'd",
    "he'll",
    "he's",
    "her",
    "here",
    "here's",
    "hers",
    "herself",
    "him",
    "himself",
    "his",
    "i",
    "i'd",
    "i'll",
    "i'm",
    "i've",
    "if",
    "in",
    "into",
    "is",
    "isn't",
    "it",
    "it's",
    "its",
    "itself",
    "let's",
    "me",
    "more",
    "most",
    "mustn't",
    "my",
    "myself",
    "no",
    "nor",
    "of",
    "off",
    "on",
    "once",
    "only",
    "or",
    "other",
    "ought",
    "our",
    "ours ",
    "ourselves",
    "out",
    "over",
    "own",
    "same",
    "shan't",
    "she",
    "she'd",
    "she'll",
    "she's",
    "should",
    "shouldn't",
    "so",
    "some",
    "such",
    "than",
    "that",
    "that's",
    "the",
    "their",
    "theirs",
    "them",
    "themselves",
    "then",
    "there",
    "there's",
    "these",
    "they",
    "they'd",
    "they'll",
    "they're",
    "they've",
    "this",
    "those",
    "through",
    "to",
    "too",
    "under",
    "until",
    "up",
    "very",
    "was",
    "wasn't",
    "we",
    "we'd",
    "we'll",
    "we're",
    "we've",
    "were",
    "weren't",
    "what",
    "what's",
    "when",
    "when's",
    "where",
    "where's",
    "which",
    "while",
    "who",
    "who's",
    "whom",
    "why",
    "why's",
    "with",
    "won't",
    "would",
    "wouldn't",
    "you",
    "you'd",
    "you'll",
    "you're",
    "you've",
    "your",
    "yours",
    "yourself",
    "yourselves"
    );

for ($i = 0; $i < count($issues1); $i++){

    if(in_array($issues1[$i], $stopwords)){
        unset($issues1[$i]);
    }

}
$issues_i = implode("/", $issues1); //testing that word were properly split
echo"$issues_i<br>";		


?>