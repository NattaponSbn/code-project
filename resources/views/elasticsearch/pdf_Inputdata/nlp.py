# from pythainlp.corpus import stopwords

# words = stopwords.words('thai')
# print(words)


# from pythainlp import word_tokenize, Tokenizer
# from pythainlp.tokenize import dict_trie
# from pythainlp.corpus.common import thai_words

# text = "การพัฒนาระบบสารเทศเพื่อการจัดการพัฒนาระบบการจัดเก็บโครงงาน วิจัย วิทยานิพนท์ ของคณะเทคโนโลยีสารเทศและการสื่อสาร"

# print("newmm  :", word_tokenize(text))  # default engine is "newmm"
# print("longest:", word_tokenize(text, engine="longest"))

# words = ["คณะเทคโนโลยีสารเทศและการสื่อสาร", "เพื่อการจัดการ"]
# custom_words_list = set(thai_words())
# ## add multiple words
# custom_words_list.update(words)
# ## add word
# # custom_words_list.add('คณะเทคโนโลยีสารเทศและการสื่อสาร')
# # custom_words_list.add('เพื่อการจัดการ')
# trie = dict_trie(dict_source=custom_words_list)

# custom_tokenizer = Tokenizer(custom_dict=trie, engine='newmm')

# print("custom :", custom_tokenizer.word_tokenize(text))