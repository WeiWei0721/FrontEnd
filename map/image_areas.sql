-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2023 at 05:44 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapfunction`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_areas`
--

CREATE TABLE `image_areas` (
  `id` int NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_message` text COLLATE utf8mb4_general_ci,
  `coords` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_areas`
--

INSERT INTO `image_areas` (`id`, `href`, `data_title`, `data_message`, `coords`) VALUES
(1, '#', 'District 1', 'Boat Quay, Cecil, Havelock Road, Marina, People’s Park, Raffles Place, Suntec City', '460,316,451,329,450,337,450,363,455,362,463,350,470,343,478,343,483,387,482,326,487,327,493,328,497,324,485,317,479,317,470,315'),
(2, '#', 'District 2', 'Anson, Chinatown, Shenton Way, Tanjong Pagar', '405,357,390,376,395,377,410,375,419,384,443,385,444,363,429,362,419,361,412,356'),
(3, '#', 'District 3', 'Alexandra, Queenstown, Redhill, Tiong Bahru', '331,300,331,308,333,313,333,315,338,322,343,322,343,332,343,337,351,344,358,346,372,349,390,354,404,354,408,353,409,351,410,339,417,335,417,330,409,327,400,327,393,325,388,330,385,323,378,322,371,325,365,325,361,319,360,315,353,310,347,304,347,299,344,297,339,300'),
(4, '#', 'District 4', 'Harbourfront, Keppel, Sentosa, Telok Blangah', '384,347,345,371,352,379,354,382,356,382,379,401,400,418,404,418,406,416,407,414,412,417,431,402,433,398,425,392,419,392,416,389,416,386,411,386,389,387,387,380,388,377,385,377,384,375,398,359,382,356,367,352'),
(5, '#', 'District 5', 'Bouna Vista, Clementi, Dover, Hong Leong Garden, Pasir Panjang, West Coast', '248,285,263,299,263,305,269,314,270,328,291,343,286,350,260,333,251,345,284,365,299,347,341,368,346,347,338,336,340,324,330,318,325,299,313,291,311,286,302,287,301,283,300,279,297,280,296,276,292,272,288,271,287,255,283,255,282,274,271,275,263,271,257,270,257,278'),
(6, '#', 'District 6', 'Beach Road (part), City Hall, High Street, North Bridge Road', '413,340,413,354,417,356,420,356,423,357,427,357,434,358,437,360,446,361,447,350,445,345,437,340,760,427,426,333'),
(7, '#', 'District 7', 'Beach Road, Bencoolen Road, Bugis, Golden Mile, Middle Road, Rocher', '428,314,425,316,425,323,422,331,428,332,430,336,437,336,447,340,447,333,449,329,450,323,458,313,468,307,463,304,460,302,449,302,447,304,433,306,432,309,432,314'),
(8, '#', 'District 8', 'Farrer Park, Little India, Serangoon Road', '429,285,430,287,431,290,433,291,432,296,432,299,435,302,447,303,447,299,459,298,451,287,443,280,435,280,433,284'),
(9, '#', 'District 9', 'Cairnhill, Killiney, Orchard, River Valley', '408,285,402,290,396,293,396,305,397,314,397,321,404,323,411,326,416,328,419,327,419,324,422,323,422,311,426,311,431,307,429,300,429,297,429,293,424,286,422,286,416,291,411,290,410,289'),
(10, '#', 'District 10', 'Ardmore, Balmoral, Bukit Timah, Grange Road, Holland Road, Orchard Boulevard, Tanglin', '319,256,319,266,320,269,319,276,313,284,316,288,320,292,325,295,340,296,341,292,346,292,347,297,353,306,359,313,366,321,370,322,379,319,385,316,388,317,390,324,393,323,394,301,392,300,392,291,405,283,398,275,393,274,380,374,363,270,347,259,339,257,332,254,326,257'),
(11, '#', 'District 11', 'Chancery , Dunearn Road, Moulmein, Newton, Novena, Thomson, Watten Estate', '345,193,337,206,337,207,341,211,342,221,339,226,334,228,332,226,332,231,333,251,340,254,347,255,360,263,374,269,394,270,405,279,411,284,413,288,420,282,424,282,428,284,436,276,440,275,440,271,435,267,431,266,428,264,420,263,419,259,413,254,416,250,420,247,418,245,421,244,420,241,415,239,410,238,405,235,402,234,398,240,396,241,390,232,387,231,385,237,380,233,378,234,376,242,372,232,364,226,352,216,351,213,351,195\"'),
(12, '#', 'District 12', 'Balestier, Toa Payoh', '421,237,421,240,422,241,422,248,419,250,418,254,420,258,423,260,432,262,440,267,443,275,452,282,459,292,465,300,469,293,467,289,466,281,474,272,467,267,467,262,464,260,457,260,451,254,450,243,447,238,445,234,430,233,425,237'),
(13, '#', 'District 13', 'Braddell , Macpherson, Potong Pasir', '452,222,451,224,448,228,448,233,453,238,453,254,458,258,466,258,469,260,469,263,476,269,484,269,486,266,485,261,490,256,496,256,496,257,499,257,501,255,501,250,495,246,490,242,484,242,483,238,483,236,480,235,480,232,467,232,460,225,459,228,455,225,454,222'),
(14, '#', 'District 14', 'Eunos, Geylang, Kembangan, Paya Lebar , Sims', '469,281,469,287,471,288,471,293,468,299,468,304,486,303,496,299,502,294,498,294,503,286,510,281,525,277,539,275,550,273,554,270,547,258,541,260,534,260,532,258,532,248,547,237,555,235,555,232,540,225,533,224,530,226,529,235,524,236,522,234,513,243,502,257,501,261,492,258,489,261,489,269,485,273,483,272,482,270,479,270,479,273,474,277'),
(15, '#', 'District 15', 'Amber Road, East Coast, Joo Chiat, Katong, Marine Parade, Meyer, Tanjong Rhu', '467,310,469,312,480,311,489,313,498,318,499,323,510,318,528,309,550,302,570,296,564,283,556,273,543,277,530,279,511,283,504,289,507,290,506,294,497,301,485,305,471,307'),
(16, '#', 'District  16', 'Bayshore, Bedok, Chai Chee, Eastwood, Kew Drive, Upper East Coast', '555,228,558,230,558,236,556,239,548,238,536,250,536,255,538,256,542,256,544,254,550,254,556,265,559,274,563,274,573,294,602,288,618,286,624,284,630,283,643,266,645,261,639,258,638,252,648,243,648,239,643,238,632,229,633,219,626,219,626,223,628,224,628,232,627,234,617,235,612,241,607,242,605,238,600,237,598,239,597,241,593,241,591,237,578,237,567,233,560,227'),
(17, '#', 'District 17', 'Changi, Flora, Loyang', '621,166,621,174,633,174,636,176,634,195,633,215,636,227,644,235,650,238,650,243,642,255,648,261,648,266,643,274,636,282,649,282,658,275,662,273,662,273,666,272,670,280,678,282,680,281,683,280,688,287,692,287,695,289,700,289,711,281,716,279,726,278,731,277,735,272,740,272,740,270,746,270,750,274,753,274,753,264,759,262,736,263,727,263,724,265,720,266,720,269,709,270,703,269,703,266,707,266,707,262,706,259,717,236,724,219,732,201,722,199,707,192,707,188,707,185,705,184,705,181,713,181,706,168,694,155,683,145,653,145,647,154,647,157,629,164'),
(18, '#', 'District 18', 'Pasir Ris, Simei, Tampines', '567,131,565,135,565,141,566,147,568,149,568,156,560,166,555,173,554,178,560,184,559,188,548,197,539,206,539,213,541,219,548,224,556,225,562,225,578,235,589,235,587,232,592,233,593,237,598,238,598,236,600,233,604,233,609,238,615,233,625,232,624,224,622,223,624,215,631,214,631,208,630,204,627,204,630,201,630,185,633,185,631,179,617,178,616,176,616,173,615,165,599,159,597,155,582,147,581,135,575,132'),
(19, '#', 'District 19', 'Hougang, Ponggol, Sengkang, Serangoon Garden', '516,102,516,114,511,115,511,119,499,129,498,145,494,145,492,143,488,150,486,163,483,160,475,168,472,177,468,177,469,177,465,176,464,182,452,190,451,202,447,202,446,205,451,207,451,212,447,215,449,218,456,216,458,220,464,220,468,226,478,227,486,229,486,235,491,236,501,244,505,244,514,237,515,234,522,229,527,231,526,228,526,223,537,217,536,206,547,193,557,186,557,182,553,179,553,165,556,165,557,161,566,151,560,142,557,141,552,149,550,142,554,129,552,121,545,116,540,112,540,101,537,100,537,98,541,94,533,93,529,97,522,98,520,100'),
(20, '#', 'District 20', 'Ang Mo Kio, Bishan, Braddell, Thomson', '380,173,390,180,390,184,386,188,386,193,379,191,379,196,381,201,372,195,371,191,366,189,365,198,361,198,358,191,354,194,352,210,363,220,370,220,371,218,373,223,380,226,380,221,384,221,387,225,390,225,393,222,398,224,404,227,411,233,422,233,427,230,446,229,444,214,448,210,442,206,442,204,446,201,447,190,454,184,462,180,459,177,462,174,462,172,453,171,452,173,432,175,431,149,429,146,420,153,414,162,411,168,401,167,397,170,384,170'),
(21, '#', 'District 21', 'Clementi Park, Hume Avenue, Ulu Pandan, Upper Bukit Timah', '256,241,254,249,254,260,267,270,281,269,281,254,284,250,288,253,289,267,296,271,303,282,309,281,316,276,316,260,314,255,319,256,323,255,331,250,329,223,336,225,339,222,339,214,330,206,324,207,321,207,320,203,317,202,315,205,312,203,304,203,297,210,287,212,292,217,288,218,291,222,291,225,287,227,280,232,283,239,276,244,268,245,263,246'),
(22, '#', 'District 22', 'Boon Lay, Jurong, Tuas', '57,209,78,228,71,225,72,229,89,242,81,239,76,243,51,216,45,219,45,234,34,266,23,298,16,318,16,327,22,330,34,341,70,342,74,337,73,328,56,309,45,289,45,283,52,278,59,286,72,280,67,292,74,295,86,287,75,302,75,308,90,311,100,323,108,322,113,317,112,312,107,302,108,296,111,295,114,308,128,308,127,292,132,295,132,307,136,309,145,310,148,305,148,297,154,294,165,299,166,303,170,303,185,290,205,306,203,289,207,286,217,302,220,295,227,279,223,281,222,271,215,264,224,259,222,256,209,244,220,252,227,258,226,263,219,263,229,275,230,284,221,298,222,309,237,319,247,319,250,322,259,319,259,312,255,310,248,308,244,303,247,301,256,306,260,306,259,300,244,284,250,281,254,276,256,267,251,260,251,242,246,235,233,231,229,227,232,218,227,208,216,208,220,196,208,190,193,189,177,196,159,196,152,190,145,191,143,202,136,202,134,196,129,198,124,199,121,193,117,193,105,180,94,179,80,183,76,187,82,199,67,199'),
(23, '#', 'District 23', 'Bukit Batok , Bukit Panjang, Choa Chu Kang, Dairy Farm, Hillview', '238,102,222,114,221,126,231,133,231,137,226,142,230,150,230,155,224,156,228,162,228,168,222,173,229,184,230,189,219,205,229,205,235,211,234,230,252,232,265,241,279,240,276,235,277,227,,285,224,281,218,282,216,287,215,280,208,294,206,302,200,317,199,315,195,307,191,322,189,321,185,314,183,309,164,305,148,294,141,282,137,263,134,256,124,246,122,237,111'),
(24, '#', 'District 24', 'Lim Chu Kang, Sungei Gedong, Tengah', '198,41,187,46,177,54,160,71,144,76,143,82,152,86,149,89,141,87,145,97,144,102,131,90,128,83,122,87,121,95,122,98,115,104,115,109,120,117,133,117,133,120,127,122,135,126,130,129,131,133,135,134,135,139,126,142,123,141,,119,140,113,144,118,135,111,124,115,118,113,113,109,113,98,125,99,136,99,147,97,152,108,158,96,161,95,164,99,164,100,169,106,169,110,166,114,165,116,168,,122,167,125,164,126,168,122,171,113,170,110,172,110,178,118,185,118,190,122,189,125,191,126,194,129,194,133,192,135,192,137,198,142,198,144,189,149,186,164,192,183,193,192,186,208,186,222,192,226,188,219,176,219,172,224,169,222,157,227,149,223,142,229,135,227,133,212,117,211,112,201,112,198,110,191,111,184,112,184,108,189,103,198,103,207,109,215,106,211,100,218,95,222,96,222,90,219,81,212,78,223,76,,233,68,231,65,226,62,231,59,220,43,216,44,213,49,209,50,204,42'),
(25, '#', 'District 25', 'Admiralty Road, Kranji, Woodgrove, Woodlands', '248,65,252,73,252,87,249,93,239,95,245,106,248,117,259,121,263,128,277,133,291,137,306,144,311,139,308,133,318,134,315,127,324,129,329,126,337,119,327,119,318,119,323,112,326,106,323,105,329,97,337,87,350,76,358,64,365,44,361,29,357,32,355,40,349,36,347,49,333,52,320,58,309,56,304,50,298,50,291,48,286,53,280,62,281,67,273,65,263,67,261,69,256,66'),
(26, '#', 'District 26', 'Springleaf, Tagore, Upper Thomson', '310,152,313,154,313,161,315,168,316,175,321,175,324,170,327,167,331,167,332,172,336,171,335,178,340,177,343,174,343,177,347,178,350,183,354,185,359,184,361,182,363,179,363,175,361,170,366,171,370,176,393,182,371,166,372,162,375,164,382,165,387,165,392,165,400,165,411,164,412,160,419,151,415,143,409,136,404,133,404,122,398,123,395,127,392,119,389,118,383,124,379,123,377,111,371,111,365,106,354,105,344,103,351,100,357,91,367,82,365,77,354,78,345,86,338,95,328,106,329,110,335,112,337,115,342,116,344,120,348,121,348,112,355,115,356,123,358,127,353,130,350,138,343,138,340,138,327,137,326,142,318,143,315,148'),
(27, '#', 'District 27', 'Admiralty Drive, Sembawang, Yishun', '298,46,308,47,314,54,325,52,333,47,345,47,347,35,350,32,354,32,355,27,359,27,364,28,366,36,369,37,368,49,366,53,367,54,367,59,362,61,358,72,368,75,372,80,366,87,358,95,354,102,369,102,374,108,383,109,384,112,381,113,383,119,390,114,402,115,406,118,407,114,410,114,413,117,420,115,426,117,426,109,429,104,434,103,432,99,438,89,446,80,453,77,453,64,449,63,441,50,432,33,418,26,406,18,394,9,389,10,386,20,381,10,352,9,343,14,332,21,322,30,315,36,307,40,302,43'),
(28, '#', 'District 28', 'Seletar, Yio Chu Kang', '406,122,406,130,413,136,422,147,428,144,436,148,436,170,450,171,452,168,465,170,466,173,472,174,473,168,484,158,484,148,488,144,497,139,497,126,508,118,508,114,514,111,506,108,498,105,493,103,479,102,464,87,460,87,459,95,454,91,451,95,451,102,438,104,436,112,435,119,429,120,426,125,424,125,422,121,414,122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_areas`
--
ALTER TABLE `image_areas`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
