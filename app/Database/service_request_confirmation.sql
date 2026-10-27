-- Run once on existing databases before deploying the service confirmation changes.
-- Existing requests and columns are preserved; old requests keep NULL values.
ALTER TABLE `service_request`
  ADD COLUMN `email` varchar(254) DEFAULT NULL,
  ADD COLUMN `docket_number` varchar(32) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  ADD UNIQUE KEY `service_request_docket_unique` (`docket_number`);
