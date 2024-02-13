<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=UTF-8>
	<title>word cloud test</title>
	<style type="text/css">
	canvas {
	position: fixed; top: 2em; right: 0;
	font-family: monospace;
	white-space: nowrap;
	}
	.support {
		color: #080;
	}
	.not_support {
		color: #800;
	}
	</style>
</head>
<body>

<h2>Word Cloud</h2>
<ul>
	<li><label> <input type="button" id="rotateRatio0_function" value="test" /></label></li>
</ul>





<canvas id="result" width="580" height="400"></canvas>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="../jquery.wordcloud.js"></script>
<script type="text/javascript">
jQuery(function ($) {

	var $r = $('#result');

	$('#wordCloudSupported').addClass(($.wordCloudSupported?'':'not_') + 'support');

	$('#rotateRatio0_function').bind(
		'click',
		function () {
			try {
				$r.wordCloud({wordList: realList, rotateRatio: 0});
			} catch (e) { alert(e); }
		}
	);

});




////////////////////////////////////////////////////////////////////
// pseudocode
//
// splice all issue sentence issues and put into an array
// remove stop words
// create blank final array
// loop through the array 
// 		count the number of instances of first word
// 		append word and instances array [word, instance] to final array
// 		remove all instances of first word from array

var realList = [
["grow",6], ["test",5], ["minecraft",3], ["server",6], ["down",4], ["broken",6], ["marital",1], ["issues",19], ["need",214], ["yarn",1], ["",575], ["gambling",1], ["addiction",1], ["cut",79], ["finger",2], ["board",16], ["help",185], ["demo",1], ["line",3], ["ocode",1], ["ready",12], ["print",80], ["maybe",3], ["processing",14], ["boolean",2], ["helpme",1], ["chris",21], ["dont",11], ["know",11], ["waht",1], ["adapter",1], ["thing",6], ["checking",1], ["wiring",13], ["check",18], ["wires",10], ["music",3], ["code",61], ["wont",12], ["run",2], ["color",8], ["pong",18], ["python",2], ["animation",10], ["hitbox",3], ["not",59], ["working",31], ["hel0",1], ["pong...",2], ["plexi",1], ["cuts",3], ["laser",67], ["cutting",33], ["lamp",4], ["make",21], ["sticker",5], ["pcb",22], ["advanced",1], ["design",26], ["3d",47], ["p",1], ["trying",13], ["get",26], ["connections",2], ["millis",16], ["assignment",22], ["score",7], ["variables",8], ["how",68], ["sauter",2], ["leds",3], ["together",9], ["function",15], ["setup",5], ["functions",5], ["loops",10], ["coding",46], ["daily",4], ["assignment.",1], ["makercase",4], ["easy",2], ["eda",1], ["trouble",12], ["da",2], ["row",1], ["circles",2], ["just",20], ["printing",18], ["stuff",12], ["sound",14], ["sensor",16], ["programing",1], ["button",31], ["forms",1], ["project",37], ["one",10], ["light",16], ["many",4], ["lights",14], ["setting",4], ["soldering.",1], ["designing",2], ["something",21], ["quick",6], ["lighting",4], ["issue",24], ["timer",16], ["woodstaining",2], ["finish",4], ["programming",1], ["touch",2], ["sensor.",1], ["simplification",1], ["powering",1], ["glue",6], ["two",5], ["curved",1], ["pieces",11], ["love",1], ["right",9], ["now",5], ["work",17], ["using",8], ["behance",6], ["add",7], ["clip",1], ["box",22], ["jumper",2], ["wire",12], ["extensions",2], ["arduino",42], ["zane",30], ["want",13], ["new",12], ["neopixels",20], ["short",2], ["brain",1], ["good",3], ["bar",4], ["triangles",4], ["collision",8], ["360",8], ["picknplacer",1], ["start",20], ["find",7], ["figure",11], ["tool",4], ["use",14], ["learn",2], ["please",38], ["review",2], ["video",3], ["game",36], ["triangle",3], ["art",3], ["plasma",11], ["sign",4], ["cura",5], ["1",5], ["4",1], ["in.",1], ["plywood",2], ["@",1], ["~600",1], ["pm",1], ["bubbles",4], ["multiple",1], ["boxes",5], ["foamcore.",1], ["hour",2], ["pen",3], ["plotter",3], ["g-code",1], ["vibrations",3], ["braedon",1], ["may",1], ["fire.",1], ["starting",5], ["table",9], ["saw",5], ["wood",9], ["somethjng",2], ["started",2], ["materials",1], ["able",3], ["hobby",1], ["motor",4], ["full",1], ["neopixel",18], ["strip",7], ["best",7], ["sanding",1], ["round",3], ["edges",1], ["fusion",18], ["grid",1], ["inkscape",3], ["question",43], ["diagram",1], ["first",2], ["time",16], ["definitely",1], ["thought",1], ["reachtopofjump",1], ["platform",2], ["step",1], ["w",3], ["concerning",1], ["classes",7], ["svg",3], ["hungry",5], ["food",1], ["asdf",31], ["assistance",3], ["cutter",9], ["computer",5], ["won’t",3], ["recognize",4], ["port",3], ["model",10], ["im",29], ["allowed",2], ["clock",4], ["annoying",1], ["yet",1], ["fix",4], ["open",1], ["cylinder",1], ["instead",1], ["closed",2], ["tinkercad",6], ["uploading",14], ["cant",13], ["remember",4], ["still",4], ["thread",2], ["top",2], ["screw",1], ["mp3",2], ["player",10], ["found",2], ["render",2], ["weird",6], ["hello",3], ["world",3], ["jumping",2], ["array",4], ["list",4], ["adding",6], ["idiot",1], ["file",14], ["exporting",1], ["brad",1], ["nailer",1], ["stability",1], ["woes",2], ["null",2], ["pointer",2], ["exception",2], ["|",1], ["wa",1], ["lazer",1], ["2nd",1], ["case",6], ["playerspeed",1], ["thanks",1], ["less",2], ["woeful",1], ["un-woeful",1], ["shenanigans",1], ["funky",1], ["hitboxes",6], ["projectile",1], ["despawning",1], ["got",2], ["questions",8], ["answering",1], ["whit",1], ["o",3], ["programmer",2], ["responding",2], ["constraints",1], ["legs",1], ["flatpack",1], ["stool",6], ["extrude",3], ["part",7], ["stuck",8], ["another",4], ["extruded",3], ["making",24], ["notches",2], ["braedons",1], ["399",17], ["sql",3], ["couple",2], ["battery",3], ["mighty",1], ["macro",1], ["pcbs",3], ["slots",1], ["keyboard",1], ["drawing",4], ["app",4], ["crashes",1], ["101",4], ["arruino",2], ["lab",12], ["much",3], ["longer",3], ["easyeda",4], ["enclosure",2], ["joints",2], ["+",6], ["forgot",4], ["else",1], ["wrong",5], ["idk",1], ["big",5], ["bounce",1], ["back",2], ["forth",1], ["id",2], ["accomplish",1], ["endeavor",1], ["changes",2], ["preexisting",1], ["holes",2], ["buttons",10], ["go",6], ["detection",3], ["clicky",1], ["bouncing",3], ["also",6], ["pressure",1], ["impact",1], ["direction",6], ["lol",4], ["potentiometer",5], ["close",1], ["swear",1], ["neopixels.",1], ["put",9], ["doesnt",7], ["work.",1], ["controller",1], ["php",14], ["mini",6], ["project.",2], ["reattach",1], ["strip.clear",1], ["arent",4], ["millisecond",1], ["esayeda",3], ["constrain",2], ["anything",1], ["life",5], ["problems",7], ["html",5], ["website",2], ["drawball",1], ["potentionmeter",3], ["led",7], ["minor",1], ["concept",1], ["mapping",2], ["✨",1], ["shelf",2], ["thermometer",1], ["error",13], ["happening",2], ["unknown",1], ["reasons",1], ["appears",1], ["dead",1], ["general",1], ["regarding",2], ["really",5], ["long",1], ["soldering",8], ["crisis",2], ["feel",1], ["like",4], ["going",7], ["fail.",1], ["strips",3], ["soddering",1], ["whole",2], ["middle",1], ["side",1], ["sure",14], ["servos",2], ["hook",2], ["properly",1], ["ultrasonic",1], ["distance",1], ["basic",1], ["advice",3], ["switch",6], ["stay.",1], ["cover",2], ["showing",5], ["lining",1], ["elements",1], ["portable",1], ["power",7], ["vs.",1], ["powered",1], ["separate",1], ["i’m",4], ["hackberry",2], ["profile",3], ["d0",1], ["wheel",2], ["256",1], ["login",1], ["studentmartha",1], ["perfectionist",1], ["shaping",1], ["phone",2], ["attaching",2], ["pictures",2], ["presentation",2], ["solder",5], ["bread",1], ["idea",6], ["whats",3], ["on.",2], ["2",13], ["minutes",1], ["ago",1], ["isnt.",1], ["type",6], ["buy",1], ["seems",4], ["circuiting",1], ["servo",10], ["neopoxel",2], ["grumpy",1], ["hollow",2], ["neo",3], ["pixel",3], ["shambles",3], ["sos.",1], ["lasercut",4], ["assembly",1], ["pins",5], ["4hr",1], ["sizing",3], ["correctly",4], ["matrix",4], ["esp32",4], ["plz",5], ["thats",1], ["ok.",1], ["file.",1], ["cases",3], ["finite",3], ["state",5], ["machine",12], ["debounced",1], ["microphone",4], ["motion",1], ["bright",2], ["dim",1], ["getting",9], ["things",7], ["keep",4], ["lost",2], ["ohm",2], ["resistor",4], ["exist",3], ["specific",4], ["capacitors",1], ["don’t",4], ["break",3], ["rule",3], ["#1",3], ["multimeter",1], ["surface",5], ["temperature",1], ["attachment",1], ["microsd",1], ["reader",1], ["sd",7], ["card",8], ["fit",2], ["graces",1], ["figuring",6], ["air",1], ["quality",1], ["malynn",1], ["-",4], ["look",5], ["chance",2], ["us",1], ["count",2], ["people",1], ["mount",1], ["failure",1], ["read",2], ["clarification",2], ["change",4], ["heat",3], ["shrink",1], ["displaying",2], ["webpage",1], ["assistant",4], ["come",4], ["ina",1], ["shared",1], ["folder",1], ["doormat",1], ["prices",1], ["call",2], ["dumb",2], ["youtube",1], ["refused",1], ["connect",4], ["status",4], ["super",2], ["cool",4], ["name",2], ["ideas",1], ["ultra",1], ["outlines",1], ["whereables",2], ["room",2], ["cast",1], ["projector",1], ["rosa",1], ["checked",1], ["crt",7], ["midimixer",1], ["miniproject",2], ["photoresistor",2], ["10k",1], ["modeling",1], ["knife",7], ["dxf",2], ["r12",1], ["r14",1], ["approval",3], ["v2.0",1], ["helphelphelphelphelphelphelphelphelphelp",1], ["settings",4], ["male",2], ["header",2], ["needed",1], ["verify",1], ["screen",8], ["panel",1], ["kiosk",1], ["database",1], ["arrays",2], ["class",15], ["ya",1], ["scrub",1], ["earlier",2], ["came",3], ["back.",2], ["currently",2], ["sticker.",2], ["resin",1], ["3-d",3], ["eevee",1], ["around",2], ["5x4.5x3",1], ["pls",13], ["sensors",2], ["turning",3], ["period",2], ["talk",3], ["lofts",1], ["unsure",1], ["convert",1], ["2d",1], ["mathematical",1], ["form.",1], ["nature",1], ["mathematics",1], ["accelerometer",1], ["blegh",1], ["rtc",6], ["reset",4], ["counter",1], ["specified",1], ["someone",2], ["resume",1], ["capstone",1], ["downloading",1], ["library",1], ["github",1], ["stroke",2], ["design.",1], ["them.",1], ["final",28], ["bit",1], ["deciding",2], ["layout",2], ["components",2], ["vinyl",16], ["sent",1], ["printer",8], ["names",1], ["way",9], ["certain",5], ["maker",1], ["printed.",1], ["cropping",1], ["math",7], ["scaling",3], ["measurement",1], ["makes",2], ["flicker",1], ["suggest",1], ["remove",1], ["support",1], ["material",1], ["circuits",3], ["struggling",2], ["soccer",2], ["goal",2], ["feature",1], ["code.",1], ["desk",1], ["paint",6], ["studio.",1], ["locked",1], ["confused",4], ["sew",1], ["better",2], ["will",4], ["motors",2], ["move",3], ["think",7], ["problem",5], ["gyroscope",3], ["output",1], ["bunch",1], ["random",5], ["symbols",1], ["hot",3], ["upload",4], ["finding",5], ["270",1], ["approved",5], ["sketch",2], ["dc",1], ["handshakeing",1], ["nullpointerexception",4], ["creative",1], ["klein",1], ["bottle",1], ["images",2], ["csc",6], ["235",4], ["looking",2], ["ordering",1], ["technology",1], ["small",5], ["didnt",2], ["set",5], ["worked",1], ["loading",1], ["printers",1], ["building",2], ["graphs",2], ["ss",1], ["mega",2], ["several",1], ["continually",1], ["repeating",1], ["message",2], ["itunrelated",1], ["bear",1], ["supply",2], ["slice",1], ["pillow",2], ["press",4], ["fingers",1], ["secured",1], ["sewing",4], ["piece",6], ["prototype",4], ["hey",3], ["it’s",2], ["goku",2], ["last",6], ["lasercutting",2], ["promise",1], ["confusing",5], ["shooting",3], ["gcode",3], ["printed",4], ["unfamiliar",1], ["printer.",1], ["turn",1], ["picture",1], ["wooden",3], ["print.",1], ["pin",4], ["103",3], ["&",2], ["levels",5], ["item",3], ["prints",4], ["pressing",1], ["engraving",3], ["le",1], ["smart",1], ["watch",1], ["interactive",1], ["product",1], ["0",4], ["little",1], ["robot",1], ["guy",2], ["dr.",1], ["cochrans",1], ["mat",1], ["321",1], ["smartwatch",2], ["hit",2], ["states",6], ["objects",3], ["disappear",3], ["npcs",1], ["overall",1], ["police",1], ["mousepressed",1], ["enemy",1], ["gets",1], ["slow",1], ["towards",1], ["end",1], ["winning",1], ["hide",2], ["speaker",4], ["alternate",1], ["ways",1], ["meaning",1], ["debounce",1], ["double",2], ["object",6], ["smaller",1], ["anticipated",1], ["enlarge",1], ["it.",1], ["leave",1], ["overnight",1], ["calling",2], ["exactly",1], ["8in.",1], ["plywood.",1], ["begging",2], ["chika",2], ["cecilia",1], ["joey",1], ["job",5], ["intervals",1], ["without",3], ["breadboard",4], ["incrementing",2], ["display",3], ["helen",3], ["couldnt",1], ["fixing",2], ["bugs",1], ["acrylic",8], ["shop",2], ["bot",1], ["fire",2], ["ice",2], ["cream",2], ["sandwich",2], ["hand",2], ["yellow",1], ["aaaaa",1], ["crazy",2], ["culmination",1], ["various",1], ["poor",1], ["decisions",2], ["programed",1], ["sos",1], ["catch",1], ["changing",4], ["uno",1], ["nano",3], ["giant",2], ["flying",2], ["face",2], ["drill",1], ["hole",2], ["zanes",2], ["sidney",1], ["inscapes",1], ["updated",1], ["codes",1], ["workong",1], ["hsfnj",1], ["hero",1], ["photo",1], ["alright",1], ["behsnce",1], ["connnecting",1], ["dumbest",1], ["person",1], ["ever",1], ["remembering",2], ["everything",1], ["wor",1], ["interactivity",1], ["removing",2], ["already",4], ["glued",1], ["t~t",2], ["entire",2], ["tree",1], ["snapped",1], ["����",1], ["cut#2",1], ["fusion360",1], ["serial",2], ["input",1], ["mysql",2], ["seat",1], ["steel",1], ["screws",1], ["adhesive",1], ["222",1], ["funnel",1], ["thingy",1], ["hi",1], ["cnc",1], ["shield",1], ["consistency",1], ["ugs",5], ["hates",1], ["wants",1], ["shouldnt",2], ["program",1], ["playing",2], ["running",2], ["play",1], ["next",3], ["observing",1], ["monitor",1], ["smoothed",1], ["analog",1], ["values",3], ["pain",1], ["skips",1], ["tell",1], ["actually",1], ["insane",1], ["malfunction",1], ["aka",1], ["none",1], ["ball",11], ["refuses",1], ["progression",2], ["understanding",2], ["breaks",1], ["players",1], ["win",2], ["trigger",1], ["greater",1], ["value",1], ["key",1], ["pressed",1], ["ramp",1], ["foam",3], ["core",2], ["statements",2], ["assist",1], ["lcd",2], ["edits",1], ["noun",1], ["forbidden",1], ["aidan",1], ["circuit",1], ["d",6], ["helloworld",2], ["points",2], ["impossible",2], ["beat",2], ["movement",3], ["left",1], ["forwards",1], ["digital",1], ["mic",1], ["doom",1], ["admin",8], ["password",1], ["audacity",1], ["download",2], ["stops",1], ["load",2], ["delay",2], ["re-rendering",1], ["obstacles",3], ["gotta",1], ["<3",4], ["restart",1], ["booleans",1], ["primary",1], ["tab",1], ["fixed",1], ["called",1], ["sfx",1], ["interacting",1], ["bullet",1], ["initializing",1], ["mark",1], ["reverse",1], ["scroll",3], ["rotary",1], ["encod",1], ["connecting",3], ["lame",1], ["snipping",1], ["connectors",1], ["corners",1], ["measure",1], ["rectangular",3], ["wood.",1], ["closer",1], ["memory",1], ["mine",2], ["rotating",1], ["proud",1], ["despawn",1], ["boss",1], ["staggering",1], ["spawning",1], ["soundissue",1], ["arraylist",4], ["wherdabuhbles",1], ["unix",1], ["julian",1], ["date",1], ["contact",1], ["ask",2], ["tassel",1], ["mode",1], ["brainstorming",1], ["housing",1], ["unit",1], ["moving",5], ["drawer",2], ["container",1], ["outside",1], ["wo",1], ["wondering",1], ["scrap",1], ["eye",1], ["laster",1], ["import",1], ["needing",1], ["cutting.",5], ["disassembling",1], ["fastled",1], ["machine.",1], ["gluing",3], ["toggle",2], ["raster",1], ["etching",1], ["stickerrrrrr",1], ["howdy",1], ["u",2], ["creating",3], ["handshek",1], ["lecture",1], ["hackathon",3], ["resets",1], ["asking",1], ["heating",1], ["pad",1], ["hotter",1], ["model.",1], ["isnt",4], ["let",1], ["gif",1], ["meannnnn",1], ["zip",3], ["pivot",2], ["cani",1], ["print>>",1], ["implimenting",1], ["screens",1], ["aligning",1], ["models",1], ["ples",2], ["disappearing",2], ["enemies",2], ["spawn",1], ["killed",1], ["foamboard",1], ["form",1], ["rastering",1], ["screwing",1], ["onto",3], ["photos",1], ["oriented",1], ["doyou",1], ["square",1], ["corner",1], ["tweezers",1], ["crumbling",1], ["eyes",1], ["shape",1], ["traffic",1], ["switching",1], ["lengths",1], ["randomizing",1], ["level",1], ["order",1], ["bullets",1], ["game-",1], ["simple",1], ["fixes",1], ["exam",1], ["putting",3], ["link",2], ["give",1], ["lives",1], ["wonky",1], ["invulnerability",1], ["seconds",1], ["wave",1], ["state.",1], ["rainbow",1], ["rainbowing.",1], ["consultation.",1], ["position",1], ["variable",2], ["character",1], ["enough",1], ["tm",1], ["rendering",1], ["half",1], ["spheres",1], ["domes",1], ["opening",1], ["forgor",1], ["tired",1], ["transfer",1], ["image",1], ["poopsockdoodoorock",1], ["favorite",1], ["understand",1], ["women",1], ["wanna",1], ["adult",1], ["parameter",1], ["hard",1], ["continuously",1], ["fall.",1], ["rgb",1], ["stand",1], ["tic",3], ["tac",3], ["toe",3], ["create",2], ["emoji",2], ["waiting",1], ["traveling",1], ["hlp",1], ["pliers",1], ["joint",1], ["rotation",1], ["require",1], ["alainas",1], ["red",1], ["herring",1], ["stomped",1], ["trace",1], ["bitmapping",1], ["chaya",1], ["checkerboard",2], ["confusion",3], ["weekly",3], ["partial",1], ["view",1], ["help✨",1], ["sink",2], ["tabletop",1], ["pipes",1], ["constraining",1], ["faucet",1], ["handle",3], ["pipe",1], ["strace",1], ["aspects",1], ["out",13], ["what",7], ["would",3], ["should",1], ["i",31], ["save",1], ["to",60], ["do",10], ["it",6], ["a",21], ["in",14], ["3",2], ["is",19], ["with",16], ["my",22], ["or",2], ["and",25], ["about",1], ["after",2], ["saved",1], ["as",4], ["resize",1], ["files",2], ["sections",1], ["of",8], ["aura",1], ["am",1], ["chill",1], ["where",2], ["broke",1], ["text",2], ["placement",1], ["troubleshooting",3], ["on",9], ["his",1], ["me",5], ["more",1], ["fast",1], ["int",1], ["up",8], ["by",3], ["twitching",1], ["hackapp",1], ["web",1], ["page",12], ["scores",2], ["declaring",2], ["winner",2], ["paige",1], ["needs",1], ["clay",3], ["vase",1], ["sean",4], ["anthony",1], ["for",24], ["are",4], ["breaking",1], ["entrepreneurship",1], ["conversation",1], ["pattern",2], ["quantity",1], ["the",22], ["edit",1], ["no",6], ["delete",3], ["account",2], ["does",1], ["affiliation",1], ["citi",1], ["log",4], ["log-in",1], ["only",1], ["works",1], ["user",8], ["phpmyadmin",1], ["echo",1], ["…",1], ["analysis",1], ["stats",9], ["20",1], ["min",1], ["says",1], ["its",3], ["fine",1], ["but",1], ["off",3], ["logo",1], ["colors",2], ["we",4], ["have",4], ["non-spray",3], [".",1], ["balanced",1], ["etch",3], ["you",4], ["strand",1], ["brightness",1], ["fabric",1], ["felt",1], ["measurements",1], ["gorilla",1], ["before",1], ["plug",1], ["flag",1], ["sautering",1], ["doors",1], ["stl",1], ["situation",1], ["confirm",1], ["some",5], ["varifying",1], ["millistime",1], ["flip",1], ["websight",1], ["different",1], ["when",3], ["supposed",1], ["parameters",1], ["export",1], ["2x6",1], ["supports",1], ["yelling",1], ["at",1], ["meanie",1], ["missing",1], ["compare",1], ["average",5], ["group",1], ["superglue",1], ["lmao",1], ["sick",1], ["lot",1], ["halp",1], ["saying",1], ["45",1], ["degree",1], ["opaque",1], ["white",1], ["guidance",2], ["path",2], ["auto",1], ["be",2], ["record",3], ["averages",1], ["appearing",2], ["cookie",1], ["if",2], ["statement",1], ["past",1], ["avgwalk",1], ["logs",1], ["entries",1], ["tables",2], ["section",1], ["avg",1], ["gaming",2], ["studying",2], ["can",2], ["sublimation",1], ["enterprise",2], ["pitch",2], ["399........",1], ["inconsistent",1], ["brick",1], ["wall",1], ["backfrop",1], ["this",3], ["an",1], ["illegal",1], ["technique",1], ["grading",1], ["tinker",1], ["hee",2], ["pots",1], ["acting",2], ["acc",1], ["ell",1], ["err",1], ["oh",1], ["met",1], ["urr",1], ["nanner",1], ["categories",2], ["fourth",1], ["chart",5], ["reading",1], ["data",9], ["result",1], ["tha..",1], ["charts",2], ["labels",1], ["scatterplots",1], ["correlating",1], ["actual",1], ["users",1], ["inserting",1], ["into",3], ["scatterplot",3], ["scatter",4], ["plot",3], ["ahhhh",1], ["command",1], ["interface",1], ["portfolio",1], ["graph",2], ["injections",1], ["information",1], ["sad",2], ["petr",2], ["plot.......",1], ["total",1], ["amount",1], ["jobs",1], ["difference",1], ["hours",3], ["from",1], ["averaged",1], ["times",2], ["forward",1], ["6",2], ["workout",1], ["forwarded",1], ["logging",1], ["both",1], ["working.",1], ["canvas",2], ["exit",1], ["com",1], ["access",1], ["say",1], ["fr",1], ["installation",1], ["lofting",1], ["visualization",3], ["automatic",1], ["format",1], ["cont.",1], ["drone",2], ["iron",3], ["behavior",1], ["boundary",1], ["fill",1], ["clothes",1], ["speed",5], ["increases",1], ["saving",1], ["submitting",1], ["mad",1], ["increase",2], ["once",2], ["gotten",2], ["doesn",1], ["bruh",1], ["slight",1], ["correct",2], ["#correct",1], ["honeycomb",1], ["t^t",1], ["cruel",1], ["unusual",1], ["clothing",1], ["manufacture",1], ["environment",1], ["errors",1], ["circle",1], ["see",1], ["unreachable",1], ["never",1], ["mind",1], ["figured",1], ["stepper",1], ["trial",1], ["fade",1], ["printin",1], ["registration",1], ["converting",1], ["parts",1], ["concern",1], ["decrease",2], ["diameter",1], ["plane",1], ["increasing",1], ["decreasing",1], ["450",2], ["plsss",1], ["conundrum",1], ["yuh",1]
]

var listTest = 
[["name" ,100], 
["country", 80], 
["city", 60], 
["state", 40], 
["neighborhood", 20], 
["continent" ,50]];



var listTest2 = 
[
    ['1', 1],
    ['2', 2],
    ['4', 1],
    ['5', 2],
    ['6', 1],
    ['7', 1],
    ['8', 1],
    ["geeks", 2],
    ["Javascript", 3],
    ["for", 3]
]; 


var listEnglish = 
[["shall",191],
["stated",131],
["United",54],
["any",42],
["preside",35],
["which",34],
["having",34],
["Laws",34],
["all",33],
["may",33],
["such",33],
["Congress",29],
["Senator",29],
["Houses",28],
["no",27],
["He",25],
["other",24],
["Section",22],
["person",22],
["But",22],
["Offices",22],
["Years",21],
["their",20],
["Time",20],
["Representative",19],
["Each",19],
["Case",19],
["one",18],
["two",17],
["constitute",16],
["power",16],
["voted",16],
["under",15],
["Legislatures",13],
["executed",13],
["thirds",13],
["Provided",12],
["number",12],
["They",12],
["thereof",12],
["Officer",12],
["during",12],
["Same",12],
["Member",11],
["Every",11],
["Citizens",11],
["If",11],
["them",11],
["make",10],
["excepted",10],
["Consent",10],
["Bill",10],
["Duty",10],
["between",10],
["Articles",9],
["several",9],
["respecting",9],
["Services",9],
["made",9],
["first",9],
["chusing",9],
["Authors",9],
["Courts",9],
["Grants",8],
["Elector",8],
["been",8],
["within",8],
["three",8],
["Manner",8],
["into",8],
["Vice",8],
["presented",8],
["Regulation",8],
["Days",8],
["enter",8],
["against",8],
["public",8],
["Establishment",7],
["directed",7],
["unless",7],
["without",7],
["holding",7],
["Place",7],
["Treason",7],
["Before",7],
["both",7],
["supreme",7],
["more",6],
["Union",6],
["chosen",6],
["second",6],
["five",6],
["elected",6],
["Tax",6],
["Thirty",6],
["eight",6],
["Impeachments",6],
["equal",6],
["removed",6],
["appointed",6],
["its",6],
["Rule",6],
["his",6],
["necessary",6],
["Money",6],
["governing",6],
["another",6],
["vest",5],
["Term",5],
["after",5],
["ten",5],
["new",5],
["Vacancies",5],
["fourths",5],
["then",5],
["than",5],
["Subjects",5],
["punish",5],
["judge",5],
["Return",5],
["Majority",5],
["either",5],
["receive",5],
["being",5],
["foreign",5],
["Coin",5],
["Acts",5],
["Crime",5],
["Jurisdiction",5],
["Form",4],
["according",4],
["determine",4],
["those",4],
["bound",4],
["meet",4],
["thousand",4],
["Elections",4],
["Class",4],
["Appointment",4],
["Conviction",4],
["Trust",4],
["Party",4],
["Trial",4],
["prescribe",4],
["Proceedings",4],
["Journal",4],
["part",4],
["required",4],
["nor",4],
["proposed",4],
["Amendment",4],
["pass",4],
["Imposts",4],
["post",4],
["inferior",4],
["War",4],
["Lands",4],
["Militia",4],
["proper",4],
["Treaties",4],
["Ambassadors",4],
["Ministers",4],
["judicial",4],
["Conventions",4],
["Words",4],
["Line",4],
["Page",4],
["Justice",3],
["general",3],
["securing",3],
["our",3],
["do",3],
["America",3],
["herein",3],
["consist",3],
["Qualification",3],
["attained",3],
["Age",3],
["seven",3],
["Inhabitant",3],
["whole",3],
["actually",3],
["enumeration",3],
["least",3],
["until",3],
["entitled",3],
["six",3],
["happen",3],
["fill",3],
["Consequence",3],
["Seat",3],
["Expiration",3],
["so",3],
["Resignation",3],
["exercise",3],
["Purposes",3],
["Oath",3],
["Affirmation",3],
["Concurrence",3],
["Judgment",3],
["Profit",3],
["different",3],
["adjourn",3],
["questioned",3],
["neither",3],
["Session",3],
["Compensation",3],
["Treasury",3],
["Felonies",3],
["Privileges",3],
["Emolument",3],
["original",3],
["become",3],
["approved",3],
["signed",3],
["Objections",3],
["him",3],
["like",3],
["Adjournment",3],
["take",3],
["lay",3],
["Debts",3],
["uniform",3],
["throughout",3],
["Credit",3],
["committed",3],
["declaring",3],
["call",3],
["Invasion",3],
["over",3],
["Departments",3],
["think",3],
["admitted",3],
["hundred",3],
["Attainder",3],
["laid",3],
["Exports",3],
["Title",3],
["Ballot",3],
["List",3],
["said",3],
["giving",3],
["Consuls",3],
["up",3],
["affect",3],
["Claims",3],
["Labour",3],
["interlined",3]];

</script>
</body>
</html>