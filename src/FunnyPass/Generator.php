<?php

namespace FunnyPass;

class Generator
{
    protected static $passwordFormats = [
        'the {{colors}} {{animals}}s {{verbs}} the {{nouns}} at {{places}}',
        'the {{adjectives}} {{animals}}s {{verbs}} the {{colors}} {{nouns}} at {{places}}',
        '{{colors}} {{animals}} at {{adjectives}} {{places}}',
        '{{colors}} {{animals}} at {{places}}',
        'I saw {{colors}} {{animals}} while {{verbs}}ing'
    ];

    protected static $colors = [
        "Red", "Orange", "Yellow", "Green", "Blue", "Indigo", "Violet", "Black", "White", "Pink", "Grey"
    ];

    protected static $verbs = [
        "abate", "abbreviate", "abet", "abhor", "abide", "abandon", "abolish", "absorb", "abuse", "accept", "access", 
        "accompany", "account", "accumulate", "achieve", "acknowledge", "acquire", "act", "activate", "adapt", "add", 
        "address", "adjust", "administer", "admire", "admit", "adopt", "advance", "advise", "affect", "afford", "age", 
        "agree", "aid", "aim", "alert", "allege", "allocate", "allow", "alter", "amend", "amount", "analyse", "announce", 
        "answer", "anticipate", "appeal", "appear", "apply", "appoint", "appreciate", "approach", "approve", "argue", 
        "arise", "arm", "arouse", "arrange", "arrest", "arrive", "ask", "assemble", "assert", "assess", "assign", "assist", 
        "associate", "assume", "assure", "attach", "attack", "attain", "attempt", "attend", "attract", "attribute", "avoid", 
        "await", "award", "back", "Balance", "ban", "bang", "Base", "Be", "bear", "beat", "become", "beg", "Begin", "behave", 
        "believe", "belong", "Bend", "benefit", "bet", "bid", "bind", "bite", "blame", "block", "blow", "boast", "boil", 
        "Book", "boost", "Born", "borrow", "bother", "bounce", "bound", "bow", "break", "breathe", "breed", "bring", "brush", 
        "build", "burn", "burst", "bury", "buy", "calculate", "Call", "calm", "campaign", "cancel", "capture", "care", 
        "carry", "carve", "cast", "catch", "cater", "cause", "cease", "celebrate", "Centre", "challenge", "change", 
        "characterise", "characterize", "charge", "Chase", "chat", "check", "cheer", "choose", "circulate", "cite", 
        "claim", "clarify", "classify", "clean", "clear", "climb", "cling", "close", "clutch", "coincide", "collapse", 
        "collect", "colour", "combine", "come", "command", "commence", "comment", "commission", "commit", "communicate", 
        "compare", "compel", "compensate", "compete", "compile", "complain", "complete", "comply", "compose", "comprise", 
        "conceal", "concede", "conceive", "concentrate", "concern", "conclude", "condemn", "conduct", "confer", "confess", 
        "confine", "confirm", "conform", "confront", "confuse", "connect", "consider", "consist", "constitute", "construct", 
        "consult", "consume", "contact", "contain", "contemplate", "continue", "contract", "contrast", "contribute", 
        "control", "convert", "convey", "convict", "convince", "Cook", "cool", "cope", "copy", "correct", "correspond", 
        "cost", "count", "counter", "couple", "cover", "crack", "crash", "crawl", "create", "creep", "criticise", 
        "criticize", "Cross", "crush", "cry", "Curl", "cut", "damage", "dance", "dare", "date", "deal", "debate", 
        "decide", "declare", "decline", "decorate", "decrease", "dedicate", "deem", "defeat", "defend", "define", 
        "delay", "deliver", "demand", "demonstrate", "deny", "depart", "depend", "depict", "deposit", "deprive", 
        "derive", "descend", "describe", "deserve", "design", "desire", "destroy", "detect", "determine", "develop", 
        "devise", "devote", "dictate", "die", "differ", "differentiate", "dig", "diminish", "dip", "direct", "disagree", 
        "disappear", "discharge", "disclose", "discover", "discuss", "dislike", "dismiss", "display", "dispose", "dissolve", 
        "distinguish", "distribute", "disturb", "divert", "divide", "do", "dominate", "double", "doubt", "draft", "drag", "drain", 
        "draw", "dream", "dress", "drift", "drink", "drive", "drop", "drown", "dry", "dump", "earn", "ease", "eat", "Echo", 
        "edit", "educate", "effect", "elect", "eliminate", "embark", "embody", "embrace", "emerge", "emphasise", "emphasize", 
        "employ", "enable", "enclose", "encounter", "encourage", "end", "endorse", "enforce", "engage", "enhance", "enjoy", 
        "enquire", "ensure", "entail", "enter", "entertain", "entitle", "envisage", "equip", "erect", "escape", "establish", 
        "estimate", "evaluate", "evolve", "examine", "exceed", "exchange", "exclude", "excuse", "execute", "exercise", 
        "exert", "exhaust", "exhibit", "exist", "expand", "expect", "experience", "explain", "explode", "exploit", 
        "explore", "export", "expose", "express", "extend", "extract", "face", "facilitate", "fade", "fail", "Fall", 
        "fancy", "favour", "fear", "feature", "feed", "feel", "fetch", "fight", "figure", "file", "fill", "finance", 
        "find", "fine", "finish", "fire", "fit", "fix", "flash", "flee", "fling", "float", "flood", "flow", "fly", 
        "focus", "fold", "follow", "forbid", "force", "forget", "forgive", "form", "formulate", "found", "free", 
        "freeze", "frighten", "frown", "fulfil", "function", "fund", "gain", "gasp", "gather", "gaze", "generate", "get", 
        "give", "glance", "go", "going", "govern", "grab", "Grant", "grasp", "greet", "grin", "grip", "grow", "guarantee", 
        "guard", "guess", "guide", "halt", "hand", "handle", "hang", "happen", "hate", "have", "head", "hear", "heat", 
        "help", "hesitate", "hide", "highlight", "hire", "hit", "hold", "honour", "Hope", "house", "Hunt", "hurry", "hurt", 
        "identify", "ignore", "illustrate", "imagine", "implement", "imply", "import", "impose", "impress", "improve", "In", 
        "include", "incorporate", "increase", "incur", "indicate", "induce", "influence", "inform", "inherit", "inhibit", 
        "initiate", "injure", "insert", "insist", "inspect", "inspire", "instruct", "integrate", "intend", "interfere", 
        "interpret", "interrupt", "intervene", "interview", "introduce", "invent", "invest", "investigate", "invite", 
        "involve", "isolate", "issue", "join", "judge", "jump", "justify", "keep", "kick", "kill", "kiss", "knit", "knock", "know", 
        "label", "lack", "Land", "last", "laugh", "launch", "lay", "lead", "lean", "leap", "learn", "leave", "lend", "let", 
        "Lie", "lift", "Light", "like", "limit", "line", "link", "list", "listen", "live", "load", "locate", "lock", "long", 
        "look", "lose", "love", "lower", "maintain", "make", "manage", "manipulate", "manufacture", "march", "Mark", "market", 
        "marry", "match", "matter", "mean", "measure", "meet", "melt", "mention", "merge", "mind", "Miss", "mix", "modify", "Monitor", 
        "motivate", "mount", "move", "multiply", "murder", "murmur", "mutter", "name", "narrow", "need", "neglect", "negotiate", "nod", 
        "note", "notice", "obey", "object", "observe", "obtain", "occupy", "occur", "offer", "omit", "open", "operate", "oppose", "opt", 
        "Order", "organise", "organize", "originate", "outline", "overcome", "overlook", "owe", "own", "pack", "paint", "Park", "part", 
        "participate", "pass", "pause", "pay", "peer", "penetrate", "perceive", "perform", "permit", "persist", "persuade", "phone", 
        "pick", "picture", "pin", "place", "plan", "plant", "play", "plead", "please", "plunge", "point", "pop", "pose", "position", 
        "possess", "pour", "practise", "praise", "pray", "precede", "predict", "prefer", "prepare", "prescribe", "present", "preserve", 
        "press", "presume", "pretend", "prevail", "prevent", "Price", "print", "proceed", "process", "proclaim", "produce", "progress", 
        "project", "promise", "promote", "prompt", "pronounce", "propose", "protect", "protest", "prove", "provide", "provoke", "publish", 
        "pull", "punish", "purchase", "pursue", "push", "put", "qualify", "question", "quote", "race", "rain", "raise", "range", "rate", 
        "reach", "react", "read", "realize", "reassure", "voice", "vote", "wait", "Wake", "walk", "wander", "want", "warm", "warn", "wash", 
        "waste", "watch", "Wave", "weaken", "wear", "weigh", "welcome", "whisper", "widen", "win", "wind", "wipe", "wish", "withdraw", 
        "witness", "wonder", "work", "worry", "wrap", "write", "yield", "yank", "Zero", "Zip", "Zone", "Zoom"
    ];

    protected static $nouns = [
        "angle", "ant", "apple", "arch", "arm", "army", "baby", "bag", "ball", "band", "basin", "basket", 
        "bath", "bed", "bee", "bell", "berry", "bird", "blade", "board", "boat", "bone", "book", "boot", "bottle", 
        "box", "boy", "brain", "brake", "branch", "brick", "bridge", "brush", "bucket", "bulb", "button", "cake", 
        "camera", "card", "carriage", "cart", "cat", "chain", "cheese", "chess", "chin", "church", "circle", "clock", 
        "cloud", "coat", "collar", "comb", "cord", "cow", "cup", "curtain", "cushion", "dog", "door", "drain", 
        "drawer", "dress", "drop", "ear", "egg", "engine", "eye", "face", "farm", "feather", "finger", "fish", 
        "flag", "floor", "fly", "foot", "fork", "fowl", "frame", "garden", "girl", "glove", "goat", "gun", 
        "hair", "hammer", "hand", "hat", "head", "heart", "hook", "horn", "horse", "hospital", "house", "island", 
        "jewel", "kettle", "key", "knee", "knife", "knot", "leaf", "leg", "library", "line", "lip", "lock", "map", 
        "match", "monkey", "moon", "mouth", "muscle", "nail", "neck", "needle", "nerve", "net", "nose", "nut", "office",
         "orange", "oven", "parcel", "pen", "pencil", "picture", "pig", "pin", "pipe", "plane", "plate", "plough", 
         "pocket", "pot", "potato", "prison", "pump", "rail", "rat", "receipt", "ring", "rod", "roof", "root", "sail", 
         "school", "scissors", "screw", "seed", "sheep", "shelf", "ship", "shirt", "shoe", "skin", "skirt", "snake", 
         "sock", "spade", "sponge", "spoon", "spring", "square", "stamp", "star", "station", "stem", "stick", "stocking", 
         "stomach", "store", "street", "sun", "table", "tail", "thread", "throat", "thumb", "ticket", "toe", "tongue", 
         "tooth", "town", "train", "tray", "tree", "trousers", "umbrella", "wall", "watch", "wheel", "whip", "whistle", 
         "window", "wing", "wire", "worm"
    ];

    protected static $places = [
        "airport", "apartment building", "bank", "barber shop", "book store", "bowling alley", "bus stop", "church", 
        "convenience store", "department store", "fire department", "gas station", "hospital", "house", "library", "movie theater", 
        "museum", "office building", "post office", "restaurant", "school", "mall", "supermarket", "train station"
    ];
    

    protected static $animals = [
        "Aardvark", "Abyssinian", "Adelie Penguin", "Affenpinscher", "Afghan Hound", "African Bush Elephant", "African Civet", 
        "African Clawed Frog", "African Forest Elephant", "African Palm Civet", "African Penguin", "African Tree Toad", "African Wild Dog", 
        "Ainu Dog", "Airedale Terrier ", "Akbash", "Akita", "Alaskan Malamute", "Albatross", "Aldabra Giant Tortoise", "Alligator", 
        "Alpine Dachsbracke", "American Bulldog", "American Cocker Spaniel", "American Coonhound", "American Eskimo Dog", "American Foxhound", 
        "American Pit Bull Terrier", "American Staffordshire Terrier", "American Water Spaniel", "Anatolian Shepherd Dog", "Angelfish", "Ant", 
        "Anteater", "Antelope", "Appenzeller Dog", "Arctic Fox", "Arctic Hare", "Arctic Wolf", "Armadillo", "Asian Elephant", "Asian Giant Hornet", 
        "Asian Palm Civet", "Asiatic Black Bear", "Australian Cattle Dog", "Australian Kelpie Dog", "Australian Mist", "Australian Shepherd", 
        "Australian Terrier", "Avocet", "Axolotl", "Aye Aye "
    ];

    protected static $adjectives = [
        "Abandoned", "Accurate", "Acidic", "Adorable", "Agreeable", "Alive", "Amazing", "Ambiguous", "Amused", "Ancient", "Angry", 
        "Anxious", "Ashamed", "Awesome", "Awful", "Beautiful", "Beneficial", "Best", "Better", "Bewildered", "Big", "Bitter", "Bizarre", 
        "Black", "Blue", "Boundless", "Brave", "Breezy", "Brief", "Broad", "Broken", "Brown", "Calm", "Careful", "Cheap", "Chubby", 
        "Classy", "Clean", "Clear", "Clever", "Clumsy", "Cold", "Colossal", "Comfortable", "Common", "Complete", "Cool", "Crazy", 
        "Creepy", "Cruel", "Curly", "Curved", "Cute", "Damaged", "Damp", "Dangerous", "Dark", "Dead", "Deafening", "Deep", "Defeated", 
        "Delicate", "Delicious", "Delightful", "Dependent", "Descriptive", "Devilish", "Dirty", "Dramatic", "Dry", "Dusty", "Dynamic", 
        "Eager", "Early", "Easy", "Elegant", "Embarrassed", "Energetic", "Enormous", "Entertaining", "Excellent", "Exclusive", "Exotic", 
        "Expensive", "Fabulous", "Fair", "Faithful", "Familiar", "Famous", "Fancy", "Fantastic", "Far", "Fast", "Fat", "Fearful", "Fearless", 
        "Fierce", "Filthy", "Flat", "Fluffy", "Forgetful", "Fortunate", "Fragile", "Free", "Freezing", "Frequent", "Fresh", "Friendly", 
        "General", "Gentle", "Gifted", "Gigantic", "Glamorous", "Good", "Gorgeous", "Graceful", "Gray", "Greasy", "Great", "Greedy", "Green", 
        "Grumpy", "Handsome", "Happy", "Hard", "Harsh", "Heartbreaking", "Helpful", "Helpless", "Hideous", "High", "Hilarious", "Historical", 
        "Holistic", "Hollow", "Hot", "Huge", "Icy", "Ignorant", "Ill", "Immense", "Impartial", "Impolite", "Important", "Impossible", 
        "Inconclusive", "Incredible", "Insidious", "Interesting", "Itchy", "Jealous", "Jolly", "Juicy", "Kind", "Known", "Lame", "Large", "Last", 
        "Late", "Lazy", "Legal", "Little", "Lively", "Long", "Loose", "Loud", "Lovely", "Low", "Lucky", "Luxurious", "Magical", "Magnificent", 
        "Mammoth", "Marvelous", "Massive", "Melodic", "Melted", "Messy", "Mindless", "Miniature", "Modern", "Mushy", "Mysterious", "Naive", "Narrow", 
        "Natural", "Naughty", "Near", "Necessary", "Nervous", "Next", "Nice", "Noisy", "Normal", "Nutritious", "Obedient", "Obese", "Obnoxious", "Odd", 
        "Old", "Old-Fashioned", "Orange", "Ordinary", "Organic", "Outstanding", "Overrated", "Painful", "Panicky", "Peaceful", "Perfect", "Petite", 
        "Phobic", "Physical", "Plain", "Pointless", "Powerful", "Premium", "Protective", "Proud", "Purple", "Quaint", "Quick", "Quiet", "Quirky", 
        "Rainy", "Rapid", "Rebel", "Red", "Regular", "Relieved", "Remarkable", "Repulsive", "Rich", "Right", "Rotten", "Round", "Rural", "Safe", 
        "Salty", "Satisfying", "Scary", "Selfish", "Shallow", "Shiny", "Short", "Shy", "Silly", "Skillful", "Skinny", "Slow", "Small", "Smart", "Smooth", 
        "Solid", "Sparkling", "Square", "Steep", "Sticky", "Straight", "Strong", "Sweet", "Swift", "Tall", "Tasteless", "Tender", "Tense", "Thin", 
        "Thoughtless", "Threatening", "Tiny", "Tough", "Typical", "Unable", "Uneven", "Uninterested", "Unknown", "Unusual", "Useless", "Vast", 
        "Victorious", "Voiceless", "Volatile", "Warm", "Weak", "Wet", "White", "Whole", "Wide", "Witty", "Wooden", "Worried", "Worthless", "Wrong", 
        "Yellow", "Young", "Yummy"
    ];

    public static function generate()
    {
        $adjectives = static::$adjectives;
        $nouns = static::$nouns;
        $animals = static::$animals;
        $places = static::$places;
        $verbs = static::$verbs;
        $colors = static::$colors;

        $format = static::$passwordFormats[array_rand(static::$passwordFormats)];
        $result    = preg_replace_callback(

            // Matches parts to be replaced use '{{}}'
            '/(\{{.*?\}})/',

            // Callback function. Use 'use()' or define arrays as 'global'
            function($matches) use ($adjectives, $nouns, $animals, $places, $verbs, $colors) {

                // Remove square brackets from the match
                // then use it as variable name
                $array = ${trim($matches[1],"{{}}")};

                // Pick an item from the related array whichever.
                return $array[array_rand($array)];
            },

            // Input string to search in.
            $format
        );

        return $result;
    }
}