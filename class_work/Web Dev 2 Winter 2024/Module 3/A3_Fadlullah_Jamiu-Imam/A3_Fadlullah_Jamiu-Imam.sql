-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 11:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `content`, `created_date`) VALUES
(1, 'Welcome to Medium\'s Daily Edition', '???? Hi from the team at Medium  Last year, the amount of information on the internet hit 120 zetabytes. A zetabyte is about a trillion gigabytes, and a gigabyte is about 678,000 pages of text. Only a tiny fraction of that information is (a) any good, or (b) of the slightest interest to you. It can be hard to separate the zetabytes that matter from those that don&rsquo;t.  Medium has always been a place where you can do that. Tens of thousands of times a day, someone uses Medium to share a kernel of wisdom or new perspective that makes sense of the world. Authors range from the 44th President of the United States to this intrepid data scientist who is taste-testing European vs. American M&amp;Ms to&hellip; maybe even you, writing about whatever you know that the rest of us don&rsquo;t (yet).  Now, we&rsquo;re making finding the most useful ideas a little easier. Welcome to the Medium Daily Edition.  The concept is simple: Real humans (hi!) who work at Medium share the best stories we&rsquo;ve found each day, Monday through Friday. We want the Daily Edition to be a place where you can always find human wisdom, unfiltered expression, and nuance (not unlike the best of Medium itself). We&rsquo;re hoping it will be a space that helps you become a smarter reader, writer, and thinker. And it will keep evolving with feedback from you (you can always email us at tips@medium.com).  Let&rsquo;s get started: This month, one in five U.S. adults took part in Dry January, the annual tradition of resetting your body (and bank account) by asking the bartender for seltzer with lemon. (Also, the annual tradition of casually mentioning that you&rsquo;re doing Dry January.) Roughly ~6% more people participated this year than last. (Lesser-known fact: Dry January originated as a way for the Finnish government to save money during World War II. &ldquo;Raitis tammikuu,&rdquo; or Sober January, was a national attempt at conserving resources to fight the Soviets.)  Based on those numbers, it seems we&rsquo;re gradually waking up to the fact that alcohol isn&rsquo;t that great for you (in any amount, at any age). In a five-part series on Medium last year, film producer  David Grover  tracked how his body changed when he stopped drinking regularly: He lost weight, his resting heart rate decreased, and his heart rate variability improved. &ldquo;I&rsquo;m not here to tell you how to live your life,&rdquo; Grover writes, &ldquo;but if you&rsquo;ve thought about going a month without alcohol, I hope I&rsquo;ve motivated you to press the button. You are the alchemist of your own body.&rdquo;  Regardless of your relationship with alcohol, short-term challenges like Dry January can be useful ways to trick yourself into longer-term growth. This is the thinking behind everything from National Novel Writing Month to Hack Weeks. What can you try today that might trigger a change lasting for the rest of the week, month, and beyond?  And let us know: How did this Daily Edition land for you? What stories or topics would you like to see in the future? Email us back at tips@medium.com.', '2024-01-31 20:35:55'),
(2, 'A Pinterest Engineering guide to technical interviews', 'Preparing for your interview Shayda Rahgozar, Recruiting  Practice: The interview itself shouldn&rsquo;t be the first time you&rsquo;re hearing and thinking about interview questions. Practice everything from potential questions to concepts ahead of the real deal. Brush up on core CS, general software engineering skills and large scale system design. Companies are constantly refreshing their interview question banks, but you can use sites like Leetcode and Interviewing.io to find great practice questions. Don&rsquo;t forget to also check out resources like Pinterest open source projects on GitHub and opensource.pinterest.com.  At Pinterest, you can generally code in whatever language you prefer during your interview, though be prepared to be flexible as there may be cases where an interviewer asks you to use a specific language based on team and role. Use this to your advantage when you&rsquo;re completing practice questions, and take some time to get familiar with the details of the language.  Research: Show interest and passion about the company. If you&rsquo;re not a regular user of the product already, spend some time getting to know what you could be working on. Share any product pain points or areas of improvement in the interview as well as how you could be involved in helping the company succeed.  Reference the company&rsquo;s own channels to get a feel for the latest trends, launches and technologies. For example, check out this blog as well as recent news and our Labs initiative for more on the Pinterest Engineering team.  This is your chance to not only showcase your problem solving and coding skills, but also show the interviewer you&rsquo;re someone with whom they&rsquo;d like to work.', '2024-01-31 20:38:58'),
(3, 'Career Switcher&rsquo;s Guide to Your Dream Tech Job, Part 1', 'Introduction &mdash; From Wall Street to Googleplex On March 31, 2019, I was downsized by a startup hedge fund. Having been a quantitative software developer in the finance industry for the last 10+ years, I didn&rsquo;t want another job doing more of the same. I set out to follow my passion and find my next job in Artificial Intelligence/Machine Learning/Deep Learning (AI/ML/DL). Over the next 6 months, I worked very hard towards that goal. By September 2019, I had multiple ML related on-site interviews and offers, including offers from both Google and Facebook. Here is how I did it, and hopefully, it would encourage and help other potential career switchers to make this transition. Your reward for switching would be two folds, both intellectually and financially. Executive Summary If you are short on time, here is the quick 5 step recipe that worked for me.  Curate: Work on a project that is passionate for you and showcase it online Study: Practice Algorithms and Data Structures coding and System Design problems and intensively Apply: Leverage multiple channels to land interviews Interview: Keep your cool during Phone and On-site Interviews Negotiate: Know what you want as you negotiate offers and match with teams As you can see, this is a very SIMPLE 5 steps recipe. However, completing each step takes a lot of HARD WORK. Read on for details.  About Me Here is a little about me, because I think this guide would be most helpful for someone with a similar background as myself, namely, experienced software engineer/developer in a non-tech industry wish to switch to a top tech company on the west coast (Bay Area or Seattle). If you have no software engineering work experience, the recipe above should still work for you, you just have to work A LOT harder than someone with the coding experience.  I graduated from the University of Waterloo in Canada as a computer engineer. ', '2024-01-31 20:40:13'),
(4, 'How to Write a Blog Post: A Step-by-Step Guide', 'Carry out market research. Doing market research sounds like a big task, but in truth, it can be as simple as accessing a social media platform and browsing user and blog profiles that match with your potential audience.  Use market research tools to begin uncovering more specific information about your audience &mdash; or to confirm a hunch or a piece of information you already knew. For instance, if you wanted to create a blog about work-from-home hacks, you can make the reasonable assumption that your audience will be mostly Gen Zers and Millennials. But it&rsquo;s important to confirm this information through research.  Create formal buyer personas. Once you&rsquo;ve brainstormed and carried out market research, it&rsquo;s time to create formal buyer personas. It&rsquo;s important because what you know about your buyer personas and their interests will inform the brainstorming process for blog posts.  &quot;Buyer personas aren&rsquo;t just for direct marketing. They can be a handy way to keep a human in mind while you&rsquo;re writing. If you&rsquo;ve got other marketing or sales teams handy, coordinate your personas,&quot; says Curtis del Principe, user acquisition manager at HubSpot. &quot;Chances are that your existing customers are exactly the kind of people you want to attract with your writing in the first place. Your sales and service teams can also have great insight into these people&rsquo;s needs and pain points.&quot;  For instance, if your readers are Millennials looking to start a business, you probably don&#039;t need to provide them with information about getting started on social media &mdash; most of them already have that down.  You might, however, want to give them information about how to adjust their social media approach (for example &mdash; from what may be a casual, personal approach to a more business-savvy, networking-focused approach). That kind of tweak is what helps you publish content about the topics your audience really wants and needs.  Don&#039;t have buyer personas in place for your business? Here are a few resources to help you get started:  Create Buyer Personas for Your Business [Free Template] Guide: How to Create Detailed Buyer Personas for Your Business [Free Tool] Make My Persona: Buyer Persona Generator 2. Check out your competition. What better way to draw inspiration than to look at your well-established competition?  It&rsquo;s worth taking a look at popular, highly reviewed blogs because their strategy and execution is what got them to grow in credibility. The purpose of doing this isn&rsquo;t to copy these elements, but to gain better insight into what readers appreciate in a quality blog.  When you find a competitor&rsquo;s blog, take the following steps:  Determine whether they&rsquo;re actually a direct competitor. A blog&rsquo;s audience, niche, and specific slant determine whether they&#039;re actually your competitor. But the most important of these is their audience. If they serve a completely different public than you, then they&rsquo;re likely not a competitor. That is why it&rsquo;s important to define your buyer personas before taking other steps in the blog creation process.  Look at the blog&rsquo;s branding, color palette, and theme. Once you determine that they&rsquo;re your competitor, it&rsquo;s time to take note of their techniques so that you can capture a similar readership. Colors and themes play a huge role in whether you seem like part of a niche &mdash; for instance, a blog about eco-friendly products should likely use earthy tones instead of bright, unnatural colors such as neon yellow or pink.  Analyze the tone and writing style of the competition. Take note of your competition&rsquo;s copywriting. Is it something you feel like you can successfully emulate? Does it ring true to the type of blog you&rsquo;d like to create? What do readers most respond to? For most, creating a tech blog might be an excellent idea, but if journalistic, review-based writing doesn&rsquo;t work for you, then that might not be a good fit. Be aware of what you can feasibly execute or hire freelance writers.  3. Determine what topics you&rsquo;ll cover. Before you write anything, pick a topic you&rsquo;d like to write about. The topic can be pretty general to start as you find your desired niche in blogging.  Here are some ways to choose topics to cover.  Find out which topics your competitors often cover. One easy way to choose topics for your blog is to simply learn what other blogs are writing about. After you determine your competitors, go through their archive and category pages, and try to find out which topics they most often publish content about. From there, you can create a tentative list to explore further. You might find, for instance, that a competitor only covers surface-level information about a subject. In your blog, you can dive more deeply and offer more value to readers.  Choose topics you understand well. No matter what type of blog you start, you want to ensure you know the topic well enough to write authoritatively about it. Rather than choosing a topic you&rsquo;ll need to research as you write, think about those that come most naturally to you. What has your professional experience been like so far? What are your hobbies? What did you study in college? These can all give rise to potential topics you can cover in depth.  Ensure the topics are relevant to your readership. You may find that you hold deep expertise in various topics, but how relevant are they to the audience you understood back in step one?  Del Principe suggests checking in with sales and service teams as well. &quot;What kinds of things do they wish customers already knew? What kinds of questions do they get asked a thousand times? What kind of objections come up from potential customers, and how do they address them?&quot;  If you&rsquo;re not serving their needs, then you&rsquo;d be shouting into a void &mdash; or, worse, attracting the wrong readership. For that reason, after identifying the topics you can feasibly write about, ask yourself whether those are subjects your audience would like to explore.', '2024-01-31 20:43:25'),
(5, 'Canada&#039;s next frontier: seizing the AI opportunity', 'For the better part of a decade, we&rsquo;ve been hearing about how Canada is having a tech moment. Academics, politicians, journalists and industry experts have rightfully been impressed by the quality of talent and innovation this country produces and the scale at which it grows. But Canada&rsquo;s tech adoption for both industry and consumers isn&rsquo;t just a &lsquo;moment&rsquo; or something that has happened by chance&ndash;it&rsquo;s now embedded in our DNA.  At Google, we&rsquo;ve been excited about this country&#039;s possibilities and innovations for more than two decades. Google has been in Canada since 2001, with offices in Waterloo, Toronto, and Montreal, proudly supporting Canada&rsquo;s thriving tech sector and the Canadians who use our products everyday.  A lot has happened with technology since we first put down our roots here. We&rsquo;ve seen the rise of smartphones, the takeoff of video streaming, growth of electric vehicles, Cloud technologies, and more. Although there&rsquo;s been an incredible amount of innovation over the years, there&rsquo;s never been such a systemic and seismic shift globally in the industry than the one we&rsquo;re seeing right now with artificial intelligence. Technology impacts every facet of our lives, and, if approached responsibly, it has the opportunity to continue to better people&rsquo;s lives with its advances.  Our impact in Canada  Since the beginning, our mission has been to organize the world&rsquo;s information and make it universally accessible and useful to all. And Canadians continue to choose to use our services every day. An Economic Impact Report published today by Public First, said Canadians identified Google Search, Google Maps, YouTube and Android as being among the 10 most helpful innovations of the last 30 years. On average, Canadians told us they used Google Search four times a day to research something for their personal life. That is the equivalent of over 5 million questions answered every hour.  Let&rsquo;s take a further look at Google&rsquo;s impact in Canada in 2022:', '2024-01-31 20:43:49'),
(7, 'Empowering Canadians to experience a safer internet', 'From connecting with friends and family to learning a new hobby, Canadians are active online in many ways. And since many families spend a lot of that time on Google platforms and devices, we&rsquo;re committed to investing in protections, privacy features and easy-to-use content controls that help families learn, play and explore safely across digital spaces. Today we&rsquo;re reminding Canadians of several resources, tips and safety features from Google and YouTube that are available for families to manage their digital experience and adopt smarter, safer online habits.  <br />\r\n<br />\r\n<br />\r\nAt YouTube, a core part of fulfilling this responsibility is quickly removing content that violates our Community Guidelines, using a combination of machine learning and human reviewers. Our policies apply to all types of content on our platform, including videos, comments, links and thumbnails, enforced consistently across language, perspectives and speakers. This month we released our Q4 Community Guidelines Enforcement report, demonstrating that YouTube removed over 5.6 million videos for violating our Community Guidelines. Of these videos, more than 94% were first flagged by our automated systems, and over 71% of these were removed before receiving more than 10 views.1  Our quarterly report is one of the ways we&rsquo;re committed to providing transparency about how we keep our platform and community safe. But we know that Canadians continue to search for tips and support for how to keep their families safe online.  Tools to manage your digital experience  YouTube Kids: We built YouTube Kids2 to create a safer environment for kids under the age of 13 to pursue their interests and curiosity. It provides extensive filters for an age-appropriate experience, along with various parental controls and settings to further customize the experience, including bedtime reminders, time watched and controls to tailor autoplay or search. You can also set an in-app timer to limit your child&rsquo;s screen time. Parents should routinely check their family settings to ensure that they continue to meet their needs. YouTube Supervised accounts: Supervised experiences2 is a new option on YouTube, where parents and caregivers have parental options and controls to determine which online experience is best for their family. Our supervised experience on YouTube works well for families with tweens and teens who have their own mobile devices or want their own accounts. <br />\r\n<br />\r\n<br />\r\n<br />\r\nWe spent the last year expanding support for these supervised accounts so that tweens can sign in to YouTube on gaming consoles, smart TVs, the YouTube Music app and more. This helps to respect a parent&#039;s choice for content settings across devices in the home where their tween watches videos or listens to music. Google Search: Users can enable SafeSearch on Google which helps filter out explicit content &ndash; in the coming months a new function will automatically blur out explicit search results for all 18+ and signed-out users. Family Link: The parental tools app Family Link2 helps parents instill healthy digital habits in their kids, providing visibility on how a child is spending time on their device. Parents can keep an eye on screen time, set a bedtime for their child&rsquo;s device and apply content restrictions. Protect your family&rsquo;s information and data privacy  Online safety also means keeping your family&rsquo;s personal information and online activity secure. Helping people stay safe online is our top priority. That&rsquo;s why we design our products with built-in protections and invest in global teams and operations to prevent abuse on our platforms.  In recent years, there has been a significant increase in cybersecurity threats, especially for individuals and groups that tend to be at higher risk for online attacks, such as activists, journalists, election and campaign officials, and people working in public life. To help anyone at risk, we&rsquo;ve made our strongest security protections easily accessible. Here are more details about the best tools, tips, and resources people can use to protect themselves online.  Enrolling in our Advanced Protection Program: We have dedicated teams of security professionals responsible for detecting and disrupting cyber threats to protect people all over the world. We have invested in advanced security solutions like our Advanced Protection Program (APP), which helps safeguard users from digital attacks, including sophisticated phishing attacks (through the use of security keys), malware and other malicious downloads on Chrome and Android, and unauthorized access to personal account data (such as Gmail, Drive, and Photos). APP is available to all users, but is specifically designed for individuals and organizations such as elected officials, political campaigns, human rights activists, and journalists, who are at higher risk of targeted online attacks. Keeping Google accounts secure and private: Our Security Checkup gives people personalized security recommendations and flags actions they should take to immediately secure their Google account. <br />\r\n<br />\r\n<br />\r\nAdditionally, Privacy Checkup provides helpful reminders of what activity is being saved, which third-party apps have permission to access user data, and the option to adjust user settings with simple controls. Both checkups take people through a step-by-step process to customize their security and privacy controls based on their individual preferences. Helping you control your online presence: On Google Search, we offer a set of policies and tools to help people take more control over how their sensitive, personally-identifiable information can be found. With the new Results about you tool, users can quickly and easily request the removal of personal contact information&mdash;like their home address, email address, or phone number&mdash;from search results. We also have a set of policies to allow people to request the removal of other types of highly personal content from Search that can cause direct harm, such as in cases of doxxing or information like bank account or credit card numbers that could be used for financial fraud. (It&rsquo;s important to remember that removing content from Google Search won&rsquo;t remove it from the internet entirely, so people may wish to contact the hosting site directly, if they&rsquo;re comfortable doing so.) Exploring the online world safely: To help people stay safe and secure when browsing the web, especially on public or free WiFi, we recommend using Chrome and ensuring there is a gray locked icon in the URL field indicating a secure connection. Users should make sure the sites they visit utilize HTTPS, which indicates the browser or app is securely connected to the website they&rsquo;re visiting. We also encourage people to use Chrome or Google Drive before downloading documents or opening suspicious email attachments. Both will automatically scan for viruses and make sure users are not being targeted by a phishing campaign. For more information on our responsibility efforts at YouTube, visit our How YouTube Works homepage. <br />\r\n<br />\r\n<br />\r\nYou can also visit our Safety Center to learn about how we&rsquo;re making every day safer with Google and YouTube. The Internet is meant to be a shared space for everyone, and we&rsquo;re committed to continuing our work to make it a safer place for people of all ages to enjoy.', '2024-02-01 20:05:55'),
(10, 'Our upcoming session covers the following key topics:', '2024 Market Insights Unveiled! Join our webinar series for a simplified outlook on the challenging global market in 2024. We&#039;ll break down uncertainties and potential game-changing trends post-Covid-19 recovery, keeping financial jargon at bay.  Deciphering Central Banks: Uncovering Upcoming Monetary Policies Discover the impact of major central banks&#039; decisions on global assets. Understand how to navigate through future monetary policy changes from the Federal Reserve, Bank of Japan, Bank of England, and European Central banks. Learn how these decisions affect Forex and gold movements.  <br />\r\n<br />\r\n<br />\r\nGeopolitical Tensions: Navigating Red Sea Scenarios Explore the impact of rising geopolitical tensions on crucial asset classes. Dive into discussions on how Red Sea tensions may influence markets, providing valuable insights for traders. Don&#039;t miss this simplified guide to tackle the complexities of 2024!  PU Prime is steadfast in our commitment towards your trading journey. Whether you are a novice trader eager to learn the ropes, or a seasoned trader looking to refine your strategies, the Global Insights: Navigating 2024 with Geopolitical Impact Predictions Webinar is thoughtfully designed to empower you. Get ready to learn, apply, and reach your trading milestones!', '2024-02-01 20:05:48'),
(11, 'Does Aging Really Make Women Of A Certain Age Invisible?', 'I&rsquo;m standing at Safeway, deciding between chicken and ribs, when a young man walks up. Trench coat. Dark hair. I move over. Not to hog the space.  He tells me I&rsquo;m a beautiful woman. Asks if he can buy me coffee. My laughter peels through the store. No, I tell him. But thank you.  Another day. Crossing the Starbucks parking lot in a sundress because it&rsquo;s too hot for leggings. A vanilla sweet cream cold brew and a walk in the summer sun sounds perfect. A gust of wind blows my dress a little.  Not quite a Marilyn on the grate moment, but it feels nice on my legs just the same. Someone whistles behind me. <br />\r\n<br />\r\n<br />\r\nI don&rsquo;t look, don&rsquo;t care.  It starts young. I was twelve, maybe thirteen, the first time a random man whistled at me. Asked me out. It happens. All women know this&mdash;an almost inevitable part of going through life in a woman-shaped body.  Until it&rsquo;s not. One day, it stops. It&rsquo;s like the website that was popular several years ago. Hot or not. One day, you&rsquo;re hot. One day, you&rsquo;re not.  All women know this, too.  I didn&rsquo;t know Lily was an archetype when I met her.  But then, how would I have? I was six. Here&rsquo;s all I knew.  The phone would ring and Mama would pick up. Listen a while and say Lily, come. Listen some more and say, Lily, just come over. Don&rsquo;t be silly, of course, I have time. If I didn&rsquo;t, I would say. I&rsquo;m making coffee already.  Then Mama would make coffee, put cookies on a plate. She made the best cookies. Giant soft pinwheels of chocolate and vanilla winding around and around as big as a saucer. Fat soft gingersnaps, sometimes.  Soft tap, tap on the door, and Mama would yell, come in.  They could have been sisters, Lily, and Mama. Tiny women. Dark curls and big brown eyes. Same height, same size, but where Mama filled up a room, Lily&hellip;', '2024-02-01 20:05:35'),
(13, '&lsquo;Medicine&rsquo;: Is sober dancing the new ecstasy?', 'I&rsquo;m on a boat in Amsterdam. It&rsquo;s 8pm on a Friday and the walls are already wet with condensation. The topless man next to me is sweating profusely as he roams the floor on all fours, techno beats spilling from the DJ booth next to him. Meanwhile, I am exploring the air with my hands. Neither of us have consumed a drop of alcohol.<br />\r\n<br />\r\nAn hour previously, our eyes were closed and we were breathing in (2, 3, 4), breathing out (2, 3, 4), noticing the moment and setting our intentions for the next couple of hours. Our tiny cups of cacao were steaming, giving the room a pleasingly chocolatey smell.<br />\r\n<br />\r\nI am at my first ecstatic dance, a concept I&rsquo;d first heard of just a few months previously. And contrary to what I&rsquo;d thought, it is not a uniquely Amsterdam thing: its origins go way back, with sacred dances having long been popular in religions and cultures around the world. The more modern form was popularised by Gabrielle Roth in 1970s California with her 5Rhythms practice, which is today available around the world and is billed as &lsquo;a dynamic way to both [work out] and to meditate in the same breath.&rsquo; Other variations of ecstatic dance have sprung up since then, with a quick Google search throwing up events in Tufnell Park, Ladbroke Grove &mdash; and at the church at the end of my boyfriend&rsquo;s road in Hackney. In fact, it is apparently enjoying a moment right now.<br />\r\n<br />\r\nMy chosen ecstatic dance takes place on the outskirts of Amsterdam, on a large, unassuming stationary boat that goes by the name Odessa. I am here with a few friends, one of whom is recovering from a burnout and seeking alternative methods for getting better.<br />\r\n<br />\r\nOn board the boat, it is surprisingly spacious. There are three floors, with a camp fire and sauna on the roof. Shoes are verboten but tea is ample, with several large dispensers offering a seemingly unlimited supply of water and a pale, rust-coloured tea. As a result, the smells on the Good Ship Odessa range from that of musty incense to a damp, BO-adjacent pong (it has been raining all day) to a whiff of naked foot. And of the aforementioned cacao, of course &mdash; upon boarding, we were bestowed a small paper cup of the stuff in exchange for our shoes. There is a guided meditation in a packed room of people and then we are invited to drink the cacao, which is supposed to give&hellip;<br />\r\n<br />\r\n', '2024-02-01 20:04:18'),
(14, 'Stanley hype and Samba cringe: Why products fall in and out of style', 'Everyone&rsquo;s talking about the Stanley cup. Not the hockey trophy &mdash; the brand of $50 water bottles that went from $70M sales to $750M in the past few years after becoming a TikTok sensation. I don&rsquo;t really get the Stanley hype. But it might be too late for me, as the brand has gotten so popular so fast as to be declared &lsquo;over&rsquo; in 2024:\r\n\r\nThe cups are &ldquo;on their way out. This is peak Stanley. There&rsquo;s no up from here.&rdquo;\r\n\r\n- Casey Lewis, Business Insider\r\n\r\nThe Adidas Samba shoe is another product that achieved viral popularity over the past few years. The sneaker became a favorite of models like Bella Hadid and Hailey Bieber, resulting in a situation where the shoes were both everywhere and unable to be bought as they sold out as soon as they came back in stock.\r\n\r\nDespite the Samba&rsquo;s popularity, last weekend one of my more stylish friends referred to wearing Sambas as cringe:\r\n\r\n&ldquo;Every girl in New York is wearing [Sambas]&hellip; it just doesn&rsquo;t feel cool anymore.&rdquo;\r\n\r\nI couldn&rsquo;t help but agree.\r\n\r\nWhat&rsquo;s happening here?\r\nPart of it is the natural cycle of fashion. Products get popular, and then they fall out of style. But why do products reach a tipping point and fall out of style?\r\n\r\nThat part can be explained by Ren&eacute; Girard&rsquo;s theory of Mimetic Desire. Mimetic Desire is the idea that we don&rsquo;t want what we want, we desire what others want. Specifically others of status. This isn&rsquo;t anything revolutionary. It&rsquo;s true in dating (if someone high-status thinks someone else is attractive, you may also find that person more attractive). It happens in careers (many students enter their MBA wanting different things, only to converge on a small set of career options desired by the rest of their class by the time they graduate). And it&rsquo;s why celebrity partnerships work. These aren&rsquo;t just a pair of sneakers. Those are Michael Jordan&rsquo;s sneakers.\r\n\r\nA key in marketing is selecting the right mediator. The mediator is the person whose desire influences others&rsquo;. In today&rsquo;s words: an influencer. PR firms are known for getting products on celebrities to build desire for products. But celebrities are pricey. Another strategy? Go a step further back: Don&rsquo;t influence the celebrity who influences your customer; influence the mediator who influences the celebrity who influences your customer.', '2024-02-01 21:57:43'),
(15, 'The Trump Exception to the Constitution', 'It&rsquo;s been almost eight years since I sued then-candidate Donald Trump for inciting violence against protesters at a presidential campaign rally in Louisville, Kentucky. Kashiya Nwanguma, a 21-year-old Black college student, attended that rally. As Trump began speaking, Nwanguma quietly made her way to the front of the crowd and held up a poster depicting Trump&rsquo;s head on the body of a pig. When Trump spotted Nwanguma, he ordered the crowd to eject her. That was just one of five times Trump stopped his half-hour speech to point out protesters and to command his crowd of supporters to &ldquo;get &rsquo;em out of here.&rdquo; Upon Trump&rsquo;s orders, the crowd descended on three people who would later become my clients: Nwanguma; Henry Brousseau, a 17-year-old white high school student; and Molly Shah, a 36-year-old white mother and special education teacher. The crowd did, in fact, get them out of there.<br />\r\n<br />\r\nThe crowd punched and shoved Brousseau and Shah, but Nwanguma received the worst of the crowd&rsquo;s wrath. As my clients were being manhandled, Trump stated: &ldquo;Don&rsquo;t hurt &rsquo;em. If I say &lsquo;go get &lsquo;em,&rsquo; I get in trouble with the press, the most dishonest human beings in the world.&rdquo; By then, they were already hurt. Trump went on to say: &ldquo;In the old days, which isn&rsquo;t so long ago, when we were less politically correct, that kinda stuff wouldn&rsquo;t have happened. Today we have to be so nice, so nice.&rdquo; Then Trump went into a discussion about how waterboarding is &ldquo;absolutely fine.&rdquo;<br />\r\n<br />\r\nBack then, U.S. democracy was chronically ill, but not quite looking for a hospice bed to die in. And yet, anyone paying attention knew that an unprecedented brand of American political violence was in the works on Trump&rsquo;s campaign trail. High-profile legal scholars and journalists were sounding the alarm, knowing that things were going to get very ugly if someone didn&rsquo;t put a stop to it. Warnings came from such unlikely sources as devout fascism enabler Ted Cruz, who said that a campaign bears responsibility for creating an environment where the candidate urges supporters to engage in violence.<br />\r\n<br />\r\nBy the time we filed our case, Trump had already stoked at least three other incidences of campaign violence. After one protester was attacked at an Alabama rally, Trump responded, &ldquo;Maybe he should have been roughed up.&rdquo; Trump instructed an Iowa crowd to &ldquo;knock the crap out of&rdquo; anyone who was &ldquo;getting ready to throw a tomato.&rdquo; Trump followed this instruction by saying, &ldquo;Seriously. Okay? Just knock the hell&hellip;&rdquo; Trump assured the crowd that &ldquo;I will&hellip;<br />\r\n<br />\r\n', '2024-02-01 20:09:15'),
(16, 'How I Won Singapore&rsquo;s GPT-4 Prompt Engineering Competition', 'Last month, I had the incredible honor of winning Singapore&rsquo;s first ever GPT-4 Prompt Engineering competition, which brought together over 400 prompt-ly brilliant participants, organised by the Government Technology Agency of Singapore (GovTech).<br />\r\n<br />\r\n<br />\r\n<br />\r\nPrompt engineering is a discipline that blends both art and science &mdash; it is as much technical understanding as it is of creativity and strategic thinking. This is a compilation of the prompt engineering strategies I learned along the way, that push any LLM to do exactly what you need and more!<br />\r\n<br />\r\n<br />\r\n<br />\r\nAuthor&rsquo;s Note:<br />\r\n<br />\r\nIn writing this, I sought to steer away from the traditional prompt engineering techniques that have already been extensively discussed and documented online. Instead, my aim is to bring fresh insights that I learned through experimentation, and a different, personal take in understanding and approaching certain techniques. I hope you&rsquo;ll enjoy reading this piece!<br />\r\n<br />\r\n<br />\r\n<br />\r\nThis article covers the following, with ???? referring to beginner-friendly prompting techniques while ???? refers to advanced strategies:<br />\r\n<br />\r\n<br />\r\n<br />\r\n1. [????] Structuring prompts using the CO-STAR framework<br />\r\n<br />\r\n<br />\r\n<br />\r\n2. [????] Sectioning prompts using delimiters<br />\r\n<br />\r\n<br />\r\n<br />\r\n3. [????] Creating system prompts with LLM guardrails<br />\r\n<br />\r\n<br />\r\n<br />\r\n4. [????] Analyzing datasets using only LLMs, without plugins or code &mdash;<br />\r\n<br />\r\nWith a hands-on example of analyzing a real-world Kaggle dataset using GPT-4<br />\r\n<br />\r\n<br />\r\n<br />\r\n1. [????] Structuring Prompts using the CO-STAR framework<br />\r\n<br />\r\nEffective prompt structuring is crucial for eliciting optimal responses from an LLM. The CO-STAR framework, a brainchild of GovTech Singapore&rsquo;s Data Science &amp; AI team, is a handy template for structuring prompts. It considers all the key aspects that influence the effectiveness and relevance of an LLM&rsquo;s response, leading to more optimal responses.<br />\r\n<br />\r\n<br />\r\n<br />\r\n', '2024-02-01 21:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  `content` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `author`, `content`) VALUES
(1, 'Fadlullah Jamiu-Imam', 'This is AI working');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'wally', 'mypass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;