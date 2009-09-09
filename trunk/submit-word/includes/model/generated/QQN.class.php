<?php
	class QQN {
		/**
		 * @return QQNodeSentLog
		 */
		static public function SentLog() {
			return new QQNodeSentLog('submit_word_sent_log', null, null);
		}
		/**
		 * @return QQNodeWord
		 */
		static public function Word() {
			return new QQNodeWord('submit_word_word', null, null);
		}
		/**
		 * @return QQNodeWordStatusLog
		 */
		static public function WordStatusLog() {
			return new QQNodeWordStatusLog('submit_word_word_status_log', null, null);
		}
	}
?>