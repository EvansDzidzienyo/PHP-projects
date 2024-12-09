

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Firstname` varchar(40) NOT NULL,
  `Surname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `register` (`id`, `Username`, `Password`, `Firstname`, `Surname`) VALUES
(1, 'Essene', '32250170a0dca92d53ec9624f336ca24', 'Evans', 'Dzidzienyo'),
(2, 'Sami', '32250170a0dca92d53ec9624f336ca24', 'Samuel', 'Dzidzienyo'),
(3, 'Evans', '5ad0442a452b4f75d856c768cf938438', 'Kofi', 'Armando'),
(4, 'Afia', '50d3380100368378df0a6876681b00c3', 'Efya', 'Asamoah');

ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;


