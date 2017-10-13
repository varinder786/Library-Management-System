SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Create `admin` table
--
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Insert data into `adminmaster`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `date`, `address`, `city`,`province`,`postal_code`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin@123', '2017-10-08 14:17:44', '105 saddletree trail','Brampton','Ontario','L6X4N1');

--
-- Create 'bookmaster' table
--

CREATE TABLE `bookmaster` (
  `book_id` int(20) NOT NULL,
  `booktitle` varchar(40) NOT NULL,
  `author` varchar(20) NOT NULL,
  `publisher` varchar(40) NOT NULL,
  `edition` varchar(40) NOT NULL,
  `isbnno` int(10) NOT NULL,
  `price` float(40) NOT NULL,
  `noofcopies` int(10) NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Insert data into `bookmaster`
--

INSERT INTO `bookmaster` (`book_id`, `booktitle`, `author`, `publisher`, `edition`, `isbnno`, `price`, `noofcopies`) VALUES
(4,'Love Story', 'Gurminder singh', 'Gurminder singh', '1st edition', '6474651911', '250', '100');


--
-- Create 'studentmaster' table
--


CREATE TABLE `studentmaster` (
  `student_id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthdate` varchar(20) NOT NULL,  
  `email` varchar(40) NOT NULL,
  `course` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `province` varchar(10) NOT NULL,
  `postalcode` varchar(40) NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Insert data into `studentmaster`
--

INSERT INTO `studentmaster` (`student_id`, `name`,`username`, `password`, `gender`, `birthdate`, `email`, `course`, `address`, `city`, `province`, `postalcode`) VALUES
(4,'Gurminder singh', 'gurminder','sohisaab','male', '1995/01/29', 'gurminder290195@gmail.com', 'MADT', '105 saddletree trail','Brampton','Ontario','L6X4N1');



--
-- Create 'libraryusermaster' table
--


CREATE TABLE `libraryusermaster` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `accountcreationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Insert data into `libraryusermaster`
--

INSERT INTO `libraryusermaster` (`user_id`, `password`, `accountcreationdate`) VALUES
('admin', 'admin@123', '2017-10-08 14:17:44');


--
-- Create 'issue_books' table
--


CREATE TABLE `issue_books` (
  `issue_id` int(40) NOT NULL,
  `student_id` int(40) NOT NULL,
  `student_name` varchar(40) NOT NULL,
  `student_course` varchar(40) NOT NULL,
  `student_email` varchar(40) NOT NULL,
  `book_name` varchar(40) NOT NULL,
  `fromdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `todate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(40) NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Insert data into `issue_books`
--

INSERT INTO `issue_books` (`issue_id`,`student_id`,`student_name`, `student_course`,`student_email`,`book_name`, `fromdate`, `todate`, `username`) VALUES
(1001,4,'Gurminder','MADT','gurminder290195@gmail.com','Love Story', '2017-10-08 14:17:44','2017-10-23 14:17:44', 'sohisaab');

--
-- Indexes for table `adminmaster`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmaster`
--
ALTER TABLE `bookmaster`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `studentmaster`
--
ALTER TABLE `studentmaster`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `libraryusermaster`
--
ALTER TABLE `libraryusermaster`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`issue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmaster`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--

-- AUTO_INCREMENT for table `bookmaster`
--
ALTER TABLE `bookmaster`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--

-- AUTO_INCREMENT for table `studentmaster`
--
ALTER TABLE `studentmaster`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--

-- AUTO_INCREMENT for table `libraryusermaster`
--
--
-- AUTO_INCREMENT for table `issue_books`
--

ALTER TABLE `issue_books`
  MODIFY `issue_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;